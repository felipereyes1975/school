<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            "second_last_name" => $this->faker->lastName(),
            'created_by' => $this->faker->randomElement(range(1, 10)),
            'updated_by' => $this->faker->randomElement(range(1, 10))
        ];
    }
}
