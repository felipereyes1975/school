<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'names','last_name','second_last_name','created_by','updated_by'
            'names' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            "second_last_name" => $this->faker->lastName(),
            'age' => $this->faker->randomElement(range(18, 50)),
            'semester' => $this->faker->randomElement(range(1, 10)),
            'created_by' => $this->faker->randomElement(range(1, 10)),
            'updated_by' => $this->faker->randomElement(range(1, 10))
        ];
    }
}
