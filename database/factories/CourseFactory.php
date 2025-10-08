<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'instructor_id' => $this->faker->numberBetween(1, 10), // adjust based on your user/instructor IDs
            'type' => $this->faker->randomElement(['free', 'paid']),
            'price' => $this->faker->randomFloat(2, 0, 500),
            'old_price' => $this->faker->optional()->randomFloat(2, 0, 600),
            'start_from' => $this->faker->optional()->dateTimeBetween('now', '+3 months'),
            'duration' => $this->faker->optional()->numberBetween(1, 100),
            'lesson_count' => $this->faker->optional()->numberBetween(1, 50),
            'prerequisites' => $this->faker->optional()->sentence(),
            'difficulty' => $this->faker->optional()->randomElement(['beginner', 'intermediate', 'advanced']),
            'image' => $this->faker->optional()->imageUrl(640, 480, 'education', true),
            'thumbnail_image' => $this->faker->optional()->imageUrl(320, 240, 'education', true),
            'thumbnail_video' => $this->faker->optional()->url(),
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}
