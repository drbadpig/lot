<?php

namespace App\Http\Controllers;

use App\Models\CategoryFolder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'folders' => CategoryFolder::all(),
        ]);
    }
}
