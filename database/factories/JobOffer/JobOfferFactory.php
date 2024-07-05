<?php

namespace Database\Factories\JobOffer;

use App\Traits\TimestampFormat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer\JobOffer>
 */
class JobOfferFactory extends Factory
{
    use TimestampFormat;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['PHP', 'Java Script', 'Java', 'C++']) . ' developer',
            'valid_until' => fake()->date($this->timestampFormat),
            'required_level' => fake()->randomElement(['junior', 'mid', 'senior']),
            'work_type' => fake()->randomElement(['remote', 'stationary', 'hybrid']),
            'work_schedule' => fake()->randomElement(['part time', 'full time']),
        ];
    }
}
