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
            'text' => fake()->text(),
            'user_id' => fake()->numberBetween(User::first()->id, DB::table('users')->orderBy('id', 'desc')->first()->id),
            'topic_id' => fake()->numberBetween(Topic::first()->id, DB::table('topics')->orderBy('id', 'desc')->first()->id),
            'likes' => fake()->numberBetween(0, 2000),
            'dislikes' => fake()->numberBetween(0, 2000),
        ];
    }
}
