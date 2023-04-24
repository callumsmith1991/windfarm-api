<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WindFarmTurbineComponent;
use App\Models\WindFarmTurbineInspection;
use App\Models\WindFarmTurbineComponentGrade;
use Illuminate\Support\Facades\DB;

class WindFarmTurbineComponentInspection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turbineInspections = WindFarmTurbineInspection::all();
        $componentGrades = WindFarmTurbineComponentGrade::all();

        if($turbineInspections->isNotEmpty()) {

            foreach($turbineInspections as $turbineInspection) {

                $components = WindFarmTurbineComponent::where('wf_turbine', $turbineInspection->wf_turbine)->get();

                if($components->isNotEmpty()) {

                    foreach($components as $component) {

                        DB::table('wf_turbine_component_inspection')->insert([
                            'time' => '11:00:00',
                            'wf_turbine_inspection' => $turbineInspection->id,
                            'wf_turbine_component' => $component->id,
                            'wf_turbine_component_grade' => $componentGrades->first()->id
                        ]);

                    }

                }

            }


        }

    }
}
