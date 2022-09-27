<?php

namespace App\Http\Controllers\Talk;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Talk;
use App\Models\TalkView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if (Auth::user()->role->id == 2) {
            $categories = Category::all();
        } else {
            $categories = Category::all()->where('is_global', true);
        }

        return view('talk.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:80', 'string'],
            'editordata' => ['required']
        ]);

        $talk = Talk::create([
            'title' => $request->title,
            'text' => $request->editordata,
            'user_id' => Auth::id(),
            'category_id' => $request->category,
        ]);

        return redirect(route('talk.show', [$talk->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        // add 1 view to table if we do not have a cookie
        if ($request->cookie('seen-talk-' . $id) == null) {
            TalkView::create([
                'talk_id' => $id,
                'user_id' => Auth::id()
            ]);

            Cookie::queue(Cookie::make('seen-talk-' . $id, 'true', 1));
        }

        return view('talk.show', [
            'talk' => Talk::find($id),
        ]);
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
