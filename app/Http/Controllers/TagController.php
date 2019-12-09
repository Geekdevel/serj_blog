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
        $tags = $post->tags;
        $returned = [];

        foreach ($tags as $tag) {
            $returned[] = '<a href="/tag/'.$tag->id.'">'.$tag->title.'</a> ';
        }

        $returned = implode(', ', $returned);
        return $returned;
    }

    public function addTag(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255']
        ]);

        $tag = Tag::firstorcreate($data);

        $post_id = $request->post_id;

        $data_new = [];
        $data_new += ['post_id' => $post_id];
        $data_new += ['tag_id' => $tag->id];

        Post_tag::create($data_new);

        $new_post_tags = Post::find($post_id);

        $new_tags = [];
        foreach ($new_post_tags->tags as $value) {
            $new_tags[] = $value->title;
        }

        return var_dump($new_tags);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
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
            return view('tag.create', compact('posts'));
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
            'title' => ['required', 'unique:tags,title', 'min:3', 'max:255']
        ]);

        $tag = Tag::create($data);

        $tag_id = $tag->id;

        foreach ($post_id as $value) {
            $data_new = [];
            $data_new += ['post_id' => $value];
            $data_new += ['tag_id' => $tag_id];

            Post_tag::create($data_new);
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
        return view('tag.show', compact('tag'));
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
            $posts = Post::all();
            return view('tag.edit', compact('tag', 'posts'));
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
