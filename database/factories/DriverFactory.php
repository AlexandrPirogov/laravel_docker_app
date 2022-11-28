<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'firstname' => $this->faker->name(),
            'lastname' => $this->faker->name(),
            'birthdate' => $this->faker->dateTimeBetween('1990-01-01', '2010-01-01'),
            'got_drivers_license_at' => $this->faker->dateTimeBetween('2010-01-01', '2020-01-01'),
        ];
    }
}
