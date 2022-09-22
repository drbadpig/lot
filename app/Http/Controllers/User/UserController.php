<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id),
            'backgrounds' => BackgroundImage::all(),
        ]);
    }

    public function updateBackground(Request $request)
    {
        $bgImage = BackgroundImage::find($request->id);

        Auth::user()->background_image_id = $request->id;
        Auth::user()->save();
        $data = ['id' => $request->id, 'path' => asset($bgImage->path)];

        return $data;
    }
}
