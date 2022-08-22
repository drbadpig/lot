<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => fake()->word().'.jpg',
            'text' => fake()->text(),
            'likes' => fake()->numberBetween(0, 200),
            'dislikes' => fake()->numberBetween(0, 50),
        ];
    }
}
