<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestContorller extends Controller
{
    public function index()
    {

        $user = User::findOrFail(1);
        // get user created at date
        $date = $user->created_at->toDateString();


        dd(DB::select('select id from users')[array_rand(DB::select('select id from users'))]->id);
    }
}
