<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enterprise>
 */
class EnterpriseFactory extends Factory
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
            'company_name' => $this->faker->randomElement([
                "Yandex",
                "Uber",
                "SyzranCity",
                "FastAndFurious"]),
            'located_in' => $this->faker->randomElement([
                "Moscow",
                "Syzran",
                "Samara",
                "Kazan",
                "Novgorod",
                "Dubna",
                "Ryazan"]),
            'created_at' => $this->faker->dateTimeBetween('2000-01-01', '2020-01-01')
        ];
    }
}
