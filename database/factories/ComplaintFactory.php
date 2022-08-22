<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\ComplaintReason;
use App\Models\Talk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sender_user_id' => fake()->numberBetween(User::first()->id, DB::table('users')->orderBy('id', 'desc')->first()->id),
            'talk_id' => fake()->numberBetween(Talk::first()->id, DB::table('talks')->orderBy('id', 'desc')->first()->id),
            'comment_id' => fake()->numberBetween(Comment::first()->id, DB::table('comments')->orderBy('id', 'desc')->first()->id),
            'user_id' => null,
            'reason_id' => fake()->numberBetween(ComplaintReason::first()->id, DB::table('complaint_reasons')->orderBy('id', 'desc')->first()->id),
            'details' => fake()->sentence()
        ];
    }
}
