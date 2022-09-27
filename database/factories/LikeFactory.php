<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'talk_id' => DB::select('select id from talks')[array_rand(DB::select('select id from talks'))]->id,
            'user_id' => DB::select('select id from users')[array_rand(DB::select('select id from users'))]->id,
        ];
    }
}
