<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'editordata' => ['required']
        ]);

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'talk_id' => $id,
            'text' => $request->editordata,
        ]);

        return back();
    }
}
