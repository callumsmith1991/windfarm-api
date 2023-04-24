<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WindFarmTurbine;
use App\Models\WindFarmTurbineComponent;

class WindFarmTurbineComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $turbines = WindFarmTurbine::all();
        $components = [
            'Rotator',
            'Propeller',
            'Blade'
        ];

        if($turbines->isNotEmpty()) {

            foreach($turbines as $turbine) {

                foreach($components as $component) {

                    WindFarmTurbineComponent::create([
                        'name' => $component,
                        'wf_turbine' => $turbine->id
                    ]);

                }
            }

        }
        
    }

}
