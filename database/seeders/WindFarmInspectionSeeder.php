<?php

namespace Database\Seeders;

use App\Models\WindFarm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WindFarmInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $windFarm = WindFarm::where('name', 'Wind Farm 1')->first();

        DB::table('wf_inspection')->insert(
            ['date' => '2021-10-4', 'wf_farm' => $windFarm->id],
            ['date' => '2021-10-6', 'wf_farm' => $windFarm->id],
        );

    }
}
