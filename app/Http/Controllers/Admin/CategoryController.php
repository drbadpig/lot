<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryFolder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.category.create', [
            'folders' => CategoryFolder::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25', 'unique:categories'],
            'description' => ['required', 'max:60'],
            'image' => ['required']
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        return view('admin.category.show', [
            'category' => Category::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id),
            'folders' => CategoryFolder::all(),
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
        $category = Category::find($id);

        if ($request->name != $category->name) {
            $request->validate([
                'name' => ['required', 'string', 'max:25']
            ]);

            $category->name = $request->name;
        }

        if ($request->description != $category->description) {
            $request->validate([
                'description' => ['required', 'max:60'],
            ]);

            $category->description = $request->description;
        }

        if ($request->image != $category->image) {
            $request->validate([
                'image' => ['required']
            ]);

            $category->image = $request->image;
        }

        $category->category_folder_id = $request->folder;
        $category->save();

        return redirect(route('admin.category.show', [$id]));
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
