<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\WindFarmTurbineComponentGrade;
use App\Models\WindFarmTurbineInspection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WindFarmSeeder::class,
            WindFarmInspectionSeeder::class,
            WindFarmTurbineSeeder::class,
            WindFarmTurbineComponentSeeder::class,
            WindFarmTurbineInspectionSeeder::class,
            WindFarmTurbineComponentGradeSeeder::class,
            WindFarmTurbineSeeder::class
        ]);
    }
}
