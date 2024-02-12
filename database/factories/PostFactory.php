<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'priority' => $this->faker->randomElement([-1, 0, 1]),
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'unpublished_at' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'archived' => $this->faker->boolean(10), // 10% chance of being true
        ];
    }
}
