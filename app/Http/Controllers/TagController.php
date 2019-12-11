<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post_tag;
use App\Post;

class TagController extends Controller
{
    public function listTag(Request $request)
    {
        $post = Post::find($request->post_id);
        $tags = $post->tags->pluck('title', 'id');
        return $tags;
    }

    public function addTag(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255']
        ]);

        $tag = Tag::updateOrCreate($data);

        $post_id = $request->post_id;

        $data_new = [];
        $data_new += ['post_id' => $post_id];
        $data_new += ['tag_id' => $tag->id];

        Post_tag::updateOrCreate($data_new);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()) {
            $posts = Post::all();
            $posts = $posts->pluck('title', 'id');
            return view('tag.create', ['posts' => $posts]);
        }
        else {
            return redirect('/neh');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_id = $request->post_id;

        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255']
        ]);
        $tag = Tag::updateOrCreate($data);
        $tag_id = $tag->id;

        $tag_id = $tag->id;

        foreach ($post_id as $value) {
            $data_new = [];
            $data_new += ['post_id' => $value];
            $data_new += ['tag_id' => $tag_id];

            Post_tag::updateOrCreate($data_new);
        }

        return redirect('/tag/'.$tag_id)->with('success', "Tag CREATE");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tag.show', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if (auth()->user()){
            $posts = Post::pluck('title', 'id');
            return view('tag.edit', ['tag' => $tag, 'posts' => $posts]);
        }
        else {
            return redirect('/neh');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

        $post_id = $request->post_id;

        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255']
        ]);
        $tag = Tag::updateOrCreate($data);
        $tag_id = $tag->id;

        $tag_id = $tag->id;

        foreach ($post_id as $value) {
            $data_new = [];
            $data_new += ['post_id' => $value];
            $data_new += ['tag_id' => $tag_id];

            Post_tag::updateOrCreate($data_new);
        }

        return redirect('/tag/'.$tag_id)->with('success', "Tag UPDATE");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/tag')->with('success', "Tag DELETED");
    }
}
