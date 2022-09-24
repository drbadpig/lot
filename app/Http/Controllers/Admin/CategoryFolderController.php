<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryFolder;
use Illuminate\Http\Request;

class CategoryFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.category-folder.index', [
            'folders' => CategoryFolder::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.category-folder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25', 'unique:category_folders']
        ]);

        $folder = CategoryFolder::create([
           'name' => $request->name
        ]);

        return redirect(route('admin.folder.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        return view('admin.category-folder.show', [
            'folder' => CategoryFolder::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view('admin.category-folder.edit', [
            'folder' => CategoryFolder::find($id),
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
        $folder = CategoryFolder::find($id);

        $request->validate([
            'name' => ['required', 'string', 'max:25', 'unique:category_folders']
        ]);

        $folder->name = $request->name;
        $folder->save();

        return redirect(route('admin.folder.show', [$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
