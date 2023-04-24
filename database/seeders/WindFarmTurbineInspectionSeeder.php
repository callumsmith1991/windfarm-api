<?php

namespace Database\Seeders;

use App\Models\WindFarmTurbine;
use App\Models\WindFarmInspection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WindFarmTurbineInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turbines = WindFarmTurbine::all();
        $inspections = WindFarmInspection::all();

        if($inspections->isNotEmpty()) {

            foreach($inspections as $inspection) {

                if($turbines->isNotEmpty()) {

                    foreach($turbines as $turbine) {

                        DB::table('wf_turbine_inspection')->insert([
                            'start_time' => '11:00:00',
                            'end_time' => '11:30:00',
                            'wf_inspection' => $inspection->id,
                            'wf_turbine' => $turbine->id
                        ]);

                    }

                }

            }

        }


    }
}
