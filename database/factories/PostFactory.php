<?php

namespace Database\Factories;

use App\Models\User;
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
            //
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(3),
           'image' => $this->faker->imageUrl(800, 600, 'nature', true, 'blog'),

            'body' => $this->faker->paragraph(10),
            'is_featured' => $this->faker->boolean(10),
            'published_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),

        ];
    }
}
