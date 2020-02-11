<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Get posts.
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     * @throws \Illuminate\Validation\ValidationException
     */

    public function index(Request $request)
    {
        $this->validate($request, [
            'published' => 'nullable|boolean',
            'has_video' => 'nullable|boolean',
        ]);

        $query = Post::query();

        if ($request->published) {
            $query->published();
        }

        if ($request->has_video == 1) {
            $query->hasVideo();
        }elseif ($request->has_video == 0){
            $request->hasNotVideo();
        }

        $posts = $query->get();

        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
