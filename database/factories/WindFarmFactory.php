<?php

namespace Database\Factories;

use App\Models\WindFarm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WindFarm>
 */
class WindFarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = WindFarm::class;

    public function definition(): array
    {
        return [
            "name" => 'Wind Farm '.rand(2, 100)
        ];
    }
}
