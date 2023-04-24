<?php

namespace Database\Seeders;

use App\Models\WindFarm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WindFarmTurbineSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $turbines = [
      'Turbine 1',
      'Turbine 2',
      'Turbine 3',
      'Turbine 4'
    ];

    $windFarm = WindFarm::where('name', 'Wind Farm 1')->first();

    foreach ($turbines as $turbine) {

      DB::table('wf_turbine')->insert([
        'name' => $turbine,
        'wf_farm' => $windFarm->id
      ]);
      
    }
  }
}
