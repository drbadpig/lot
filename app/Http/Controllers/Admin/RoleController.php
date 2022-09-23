<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.role.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles', 'max:25', 'string'],
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        return redirect(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        return view('admin.role.show', [
            'role' => Role::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        return view('admin.role.edit', [
            'role' => Role::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if ($request->name != $role->name) {
            $request->validate([
                'name' => ['required', 'unique:roles', 'max:25', 'string'],
            ]);

            $role->name = $request->name;
            $role->save();
        }


        return redirect(route('admin.role.show', [$role->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        $users = User::all()->where('role_id', $id);

        foreach ($users as $user) {
            $user->role_id = 1;
            $user->save();
        }

        $role->delete();

        return redirect(route('admin.role.index'));
    }
}
