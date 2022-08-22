<?php

namespace Database\Factories;

use App\Models\Talk;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'talk_id' => fake()->numberBetween(Talk::first()->id, DB::table('talks')->orderBy('id', 'desc')->first()->id),
            'likes' => fake()->numberBetween(0, 2000),
            'dislikes' => fake()->numberBetween(0, 2000),
            'is_edited' => fake()->boolean(),
        ];
    }
}
