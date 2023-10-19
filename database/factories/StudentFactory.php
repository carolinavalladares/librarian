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
        $firstName = fake()->firstName();
        $lastName = fake()->lastName();
        $name = $firstName . " " . $lastName;
        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'approved' => fake()->randomElement([0, 1, NULL]),
            'registration' => fake()->unique()->numerify('############')
        ];
    }
}