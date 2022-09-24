<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class SettingsController extends Controller
{
    public function create()
    {
        return view('user.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();

        Auth::logout();
        return redirect(route('login'));
    }

    public function updatePersonal(Request $request)
    {
        if ($request->username != Auth::user()->username) {
            $request->validate([
                'username' => ['required', 'unique:users', 'max:25', 'string'],
            ]);

            Auth::user()->username = $request->username;
            Auth::user()->save();
        }

        if ($request->email != Auth::user()->email) {
            $request->validate([
                'email' => ['required', 'unique:users', 'max:25', 'string'],
            ]);

            Auth::user()->email = $request->email;
            Auth::user()->save();
        }

//        return redirect(route('settings'));
        return back()->withInput()->with('success', 'Данные были обновленызрз');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => ['sometimes', 'image:jpg,jpeg,png']
        ]);

        $storage_path = remove_storage_from_path(Auth::user()->image);
        if (Storage::exists($storage_path)) {
            Storage::delete($storage_path);
        }

        $image = $request->file('image');
        $path = $image->storeAs('avatars', 'user' . Auth::id() . '.' . $image->getClientOriginalExtension());


        Auth::user()->image = 'storage/'.$path;
        Auth::user()->save();

        return back()->withInput()->with('success', 'Данные были обновленызрз');
    }
}
