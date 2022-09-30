<?php

namespace App\Http\Controllers\Talk;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Talk;
use Illuminate\Http\Request;

class TalkLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return array data
     */
    public function store(Request $request)
    {
        $like = Like::create([
            'talk_id' => $request->talk_id,
            'user_id' => $request->user_id,
        ]);

        $talk = Talk::withTrashed()->find($request->talk_id);

        return ['likes' => thousands_format(count($talk->likes)), 'like_id' => $like->id];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);

        $like->delete();

        return [];
    }
}
