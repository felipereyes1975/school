<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'desc', 'floor', 'building'
            'desc' => $this->faker->sentence(),
            'floor' => $this->faker->randomElement(range(1, 4)),
            'building' => $this->faker->randomElement(range(1, 4)),
            'created_by' => $this->faker->randomElement(range(1, 10))
        ];
    }
}
