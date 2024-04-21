<?php

namespace Database\Factories\JobOffer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from' => fake()->numberBetween(1000, 4000),
            'to' => fake()->numberBetween(5000, 40000),
            'currency' => fake()->randomElement(['USD', 'EUR', 'PLN']),
            'description' => fake()->text(20),
        ];
    }
}
