<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show($id)
    {
//        dd(User::findOrFail($id));
        return view('user.profile', [
            'user' => User::findOrFail($id),
            'title' => 'Профиль',
        ]);
    }
}
