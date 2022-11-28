<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
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
            //'brand_id' => $this->faker->randomElement([1,2,3, 58, 59]),
            'brand' => $this->faker->unique()->name(),
            'type' => $this->faker->randomElement(Brand::BRANDS_TYPE),
            'version' => $this->faker->regexify('[A-Za-z0-9]{4}'),
            'seats' => $this->faker->randomElement([2,4,6]),
            'engine_power' => $this->faker->numberBetween(90,200),
            'release_date' => $this->faker->dateTimeBetween('1990-01-01', '2020-01-01'),
            'logo' => ""
        ];
    }
}
