<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'message' => $this->faker->paragraph(3),
            'rating' => $this->faker->numberBetween(1, 5),
            'is_approved' => false,
            'approved_at' => null,
        ];
    }

    /**
     * Mark the review as approved.
     */
    public function approved(): self
    {
        return $this->state(fn (array $attributes) => [
            'is_approved' => true,
            'approved_at' => now(),
        ]);
    }
}
