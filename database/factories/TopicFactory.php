<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'category_id' => fake()->numberBetween(Category::first()->id, DB::table('categories')->orderBy('id', 'desc')->first()->id),
            'is_general' => fake()->boolean(),
            'image' => '<svg><path></path></svg>'
        ];
    }
}
