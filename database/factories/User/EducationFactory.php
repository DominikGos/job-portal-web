<?php

namespace Database\Factories\User;

use App\Traits\TimestampFormat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EducationFactory extends Factory
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
            'school_name' => fake()->randomElement(['Massachusetts Institute of Technology', 'Harvard University', 'Stanford University', 'California Institute of Technology']),
            'description' => fake()->text(50),
            'started_at' => fake()->time($this->timestampFormat),
            'end_at' => fake()->time($this->timestampFormat),
        ];
    }
}
