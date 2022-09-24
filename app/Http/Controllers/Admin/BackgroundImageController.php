<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.background.index', [
            'backgrounds' => BackgroundImage::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.background.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25', 'unique:background_images'],
            'image' => ['required', 'image:jpg,jpeg,png']
        ]);

        $image = $request->file('image');
        $path = $image->storeAs('backgrounds', $request->name . '.' . $image->getClientOriginalExtension());

        $background = BackgroundImage::create([
            'name' => $request->name,
            'path' => 'storage/' . $path
        ]);

        return redirect(route('admin.background.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        return view('admin.background.show', [
            'background' => BackgroundImage::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        return view('admin.background.edit', [
            'background' => BackgroundImage::find($id),
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
        $background = BackgroundImage::find($id);

        if ($request->name != $background->name) {
            $request->validate([
                'name' => ['required', 'string', 'max:25', 'unique:background_images'],
            ]);

            $new_path = remove_storage_from_path($background->path);
            $new_path = str_replace($background->name, $request->name, $new_path);

            Storage::move(remove_storage_from_path($background->path), $new_path);

            $background->name = $request->name;
            $background->path = 'storage/' . $new_path;
            $background->save();
        }

        if ($request->image != null) {
            $request->validate([
                'image' => ['sometimes', 'image:jpg,jpeg,png'],
            ]);

            Storage::delete(remove_storage_from_path($background->path));

            $image = $request->file('image');
            $path = $image->storeAs('backgrounds', $background->name . '.' . $image->getClientOriginalExtension());
        }

        return redirect(route('admin.background.show', [$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $background = BackgroundImage::find($id);

        Storage::delete(remove_storage_from_path($background->path));

        $users = User::all()->where('background_image_id', $id);

        foreach ($users as $user) {
            $user->background_image_id = 1;
            $user->save();
        }

        $background->delete();

        return redirect(route('admin.background.index'));
    }
}
