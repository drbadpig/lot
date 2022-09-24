<?php

namespace Database\Factories;

use App\Models\CategoryFolder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'description' => fake()->sentence(),
            'category_folder_id' => fake()->numberBetween(CategoryFolder::first()->id, DB::table('category_folders')->orderBy('id', 'desc')->first()->id),
            'image' => '<svg><path></path></svg>',
        ];
    }
}
