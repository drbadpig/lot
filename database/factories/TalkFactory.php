<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talk>
 */
class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'text' => fake()->text(),
            'user_id' => DB::select('select id from users')[array_rand(DB::select('select id from users'))]->id,
            'category_id' => DB::select('select id from categories')[array_rand(DB::select('select id from categories'))]->id,
        ];
    }
}
