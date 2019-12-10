<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->roles->role == 'editor') {
            $posts = $user->posts;
        }
        else {
            $posts = Post::all();
        }
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()) {
            $categories = Category::all();
            return view('posts.create', ['categories' => $categories]);
        } else {
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
        if($request->hasFile('image')) {
            $image = $request->image->storeAs('images',date('dWmYB').'.'.$request->image->extension(),'public');
        }
        else {
            $image = null;
        }

        $data = $request->validate([
            'title' => ['required', 'unique:posts,title', 'min:3', 'max:255'],
            'body' => ['required', 'min:5', 'max:10000'],
            'meta_keywords' => ['required', 'min:3', 'max:255'],
            'meta_description' => ['required', 'min:5', 'max:255']
        ]);

        $data += ['image' => $image, 'author_id'=>auth()->id(), 'category_id'=>$request->category_id];

        $post = Post::create($data);

        return redirect('/posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()) {
            $categories = Category::all();
            return view('posts.edit', ['categories' => $categories, 'post' => $post]);
        } else {
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
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('image')) {
            $image = $request->image->storeAs('images',date('dWmYB').'.'.$request->image->extension(),'public');
        }
        else {
            $image = $post->image;
        }

        $data = $request->validate([
            'title' => ['required', 'unique:posts,title,'.$post->id, 'min:3', 'max:255'],
            'body' => ['required', 'min:5', 'max:10000'],
            'meta_keywords' => ['required', 'min:3', 'max:255'],
            'meta_description' => ['required', 'min:5', 'max:255']
        ]);
        $data += ['image' => $image, 'author_id'=>auth()->id(), 'category_id'=>$request->category_id];

        $post->update($data);

        return redirect('/posts/'.$post->id)->with('success', "Post UPDATE");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', "Post DELETED");
    }
}
