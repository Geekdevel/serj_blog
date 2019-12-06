<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post_tag;
use App\Post;

class TagController extends Controller
{
    /*public function addTag(Request $request)
    {

        //var_dump([$request->title, $request->id]);
        //exit;
        //return $request->data;
    }*/
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
        /*echo 'This is store';
        echo "<br/>";
        var_dump([$request->title, $request->post_id]);
        exit;*/

        /*$title = $request->title;
        $post_id = $request->post_id;

        $tag = new Tag();

        $tag->title = $title;
        $tag->save();

        $tag_id = $tag->id;

        $post_tag = new Post_tag();
        $post_tag->tag_id = $tag_id;
        $post_tag->post_id = $post_id;
        $post_tag->save();

        $new_post_tag = Post::find($post_id);

        return var_dump($new_post_tag->title);*/

        $data = $request->validate([
            'title' => ['required', 'unique:tags,title', 'min:3', 'max:255']
        ]);

        $tag = Tag::create($data);

        $post_id = $request->post_id;

        $data_new = [];
        $data_new += ['post_id' => $post_id];
        $data_new += ['tag_id' => $tag->id];

        Post_tag::create($data_new);

        $new_post_tags = Post::find($post_id);

        return var_dump($new_post_tags->tags);
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
