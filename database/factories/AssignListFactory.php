<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssignList>
 */
class AssignListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //your code
            'driver_id' => $this->faker->randomElement(\App\Models\Driver::all())['id'],
            'vehicle_id' => $this->faker->randomElement(\App\Models\Vehicle::all())['id'],
            'date_start' => $this->faker->dateTimeBetween('2010-01-01', '2020-01-01'),
            'date_end' => $this->faker->randomElement([$this->faker->dateTimeBetween('2000-01-01', '2020-01-01'), null])
        ];
    }
}
