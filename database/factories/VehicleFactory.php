<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
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
            #TODO make request for avaible brand_id
            'mileage' => $this->faker->numberBetween(10000, 700000),
            'short_number' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'delivery_date' => $this->faker->dateTimeThisMonth(),
            'image' => "",
            'brand_id' => $this->faker->randomElement(\App\Models\Brand::get('id')),
        ];
    }
}
