<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WindFarmTurbineComponentGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Really Bad'],
            ['name' => 'Bad'],
            ['name' => 'OK'],
            ['name' => 'Good'],
            ['name' => 'Perfect'],
        ];

        DB::table('wf_turbine_component_grade')->insert($data);

    }
}
