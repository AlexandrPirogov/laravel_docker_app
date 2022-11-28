<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkingList>
 */
class WorkingListFactory extends Factory
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
            'assign_id' => $this->faker->randomElement(\App\Models\AssignList::all())['id'],
            'working_start' => $this->faker->dateTimeBetween('2010-01-01 00:00:00', '2020-01-01 00:00:00'),
            'working_end' => $this->faker->dateTimeBetween('2019-01-01 00:00:00', '2020-01-01 00:00:00')
        ];
    }
}
