<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
