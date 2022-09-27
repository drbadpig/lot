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
            'user_id' => DB::select('select id from users')[array_rand(DB::select('select id from users'))]->id,
            'talk_id' => DB::select('select id from talks')[array_rand(DB::select('select id from talks'))]->id,
        ];
    }
}
