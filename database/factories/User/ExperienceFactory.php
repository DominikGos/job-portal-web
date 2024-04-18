<?php

namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->randomElement(['facebook', 'google', 'apple', 'youtube']),
            'description' => fake()->text(50),
            'started_at' => fake()->time($this->timestampFormat),
            'end_at' => fake()->time($this->timestampFormat),
        ]; 
    }
}
