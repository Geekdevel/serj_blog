<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\User;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $user = Auth::user();
        if (!empty($user)) {
            $role = $user->roles->role;
            if ($role == 'admin') {
                return view('posts.index', compact('posts', 'role', 'user'));
            } elseif ($role == 'editor') {
                $posts_sort = [];
                foreach ($posts as $post) {
                    if ($user->id == $post->author_id) {
                        $posts_sort[] = $post;
                    }
                }
                $posts = $posts_sort;
                return view('posts.index', compact('posts', 'role', 'user'));
            } else {
                return redirect('/neh');
            }
        } else {
            return view('posts.index', compact('posts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if (!empty($user)) {
            $categories = Category::all();
            $post = new Post();
            return view('posts.create', compact('categories', 'post', 'user'));
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
        $post = new Post();
        $post->title = strip_tags($request->title);
        $post->body = htmlspecialchars($request->body);
        $post->category_id = strip_tags($request->category_id);
        $post->author_id = $request->user;
        $post->meta_keywords = htmlspecialchars($request->meta_keywords);
        $post->meta_description = htmlspecialchars($request->meta_description);

        if (!empty($request->image)) {
            $post->image = $request->image;
        } else {
            $post->image = null;
        }

        $post->save();

        return redirect('/posts/{{$post->id}}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $post = Post::find($id);

        return view('posts.show', compact('post','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if (!empty($user)) {
            $post = Post::find($id);
            $categories = Category::all();

            return view('posts.edit', compact('post', 'categories'));
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
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = strip_tags($request->title);
        $post->body = htmlspecialchars($request->body);
        $post->category_id = strip_tags($request->category_id);
        $post->author_id = $request->user;
        $post->meta_keywords = htmlspecialchars($request->meta_keywords);
        $post->meta_description = htmlspecialchars($request->meta_description);

        if (!empty($request->image)) {
            $post->image = $request->image;
        } else {
            $post->image = null;
        }

        $post->save();

        return redirect('/posts/{{$post->id}}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
