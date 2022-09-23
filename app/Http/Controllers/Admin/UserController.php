<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        return view('admin.user.show', [
            'user' => User::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view('admin.user.edit', [
            'user' => User::find($id),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->username != $user->username) {
            $request->validate([
                'username' => ['required', 'unique:users', 'max:25', 'string'],
            ]);

            $user->username = $request->username;
        }

        $user->role_id = $request->role;
        $user->save();

        return redirect(route('admin.user.show', [$user->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Storage::delete(str_replace('storage/', '', $user->image));

        $user->delete();

        return redirect(route('admin.user.index'));
    }

    /**
     * Remove user's image.
     *
     * @param  int  $id
     */
    public function deleteImage($id)
    {
        $user = User::find($id);

        Storage::delete(str_replace('storage/', '', $user->image));

        $user->image = 'images/no-image.jpg';
        $user->save();

        return back()->withInput()->with('success', 'Данные были обновлены');
    }
}
