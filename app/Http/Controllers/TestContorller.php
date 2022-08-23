<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestContorller extends Controller
{
    public function index()
    {

        $user = User::findOrFail(1);
        // get user created at date
        $date = $user->created_at->toDateString();


        // get user role
        $role = $user->role;

        // get amount of comments
        $usersComments = $user->comments;

        // get amount of talks
        $usersTalks = $user->talks;

        dd($date);
    }
}
