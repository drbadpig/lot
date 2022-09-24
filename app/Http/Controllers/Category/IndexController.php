<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);

        return view('category.index', [
            'category' => $category,
            'talks' => $category->talks
        ]);
    }
}
