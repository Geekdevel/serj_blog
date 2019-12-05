<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($user = auth()->user()) {
            if ($user->roles->role == 'admin'){
                $categories = Category::all();
                return view('category.index', compact('user', 'categories'));
            } elseif ($user->roles->role == 'editor') {
                    $categories=[];
                    $posts = $user->posts;
                    foreach ($posts as $post)
                    {
                        $categories[] = $post->category;
                    }
                $categories = array_unique($categories);
                return view('category.index', compact('user', 'categories'));
            } else {
                return redirect('/neh');
            }
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->roles->role == 'admin'){
            $user = auth()->user();
            return view('category.create', compact('user'));
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
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'meta_keywords' => ['required', 'max:255'],
            'meta_description' => ['required']
        ]);
        Category::create($data);

        return redirect('/category')->with('success', 'Category CREATE!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $user = auth()->user();
        if ($user) {
            $role = $user->roles->role;

            if ($role == 'admin') {
                $posts = $category->posts;

                if (sizeof($posts)) {
                    return view('category.show', compact('category', 'posts', 'user', 'role'));
                }
                else {
                    $aliarm = 'There are no your height in this category. Want to create?';
                    return view('category.show', compact('category', 'aliarm', 'user', 'role'));
                }

            }
            elseif ($role == 'editor') {
                $posts_all_cetegory = $category->posts;
                $posts = [];

                foreach ($posts_all_cetegory as $post)
                {
                    if ($post->user->id == $user->id) {
                        $posts[] = $post;
                    }
                }

                if ($posts){
                    return view('category.show', compact('category', 'posts', 'user', 'role'));
                }
                else {
                    $aliarm = 'There are no your height in this category. Want to create?';
                    return view('category.show', compact('category', 'aliarm', 'user', 'role'));
                }

            }
        }
        else {
            $posts = $category->posts;
            /*echo "User ne prishol";
            exit;*/
            $user = null;
            return view('category.show', compact('category', 'posts', 'user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $user = auth()->user();
        if ($user && $user->roles->role == 'admin'){
            return view('category.edit', compact('user', 'category'));
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
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'meta_keywords' => ['required', 'max:255'],
            'meta_description' => ['required']
        ]);
        $category->update($data);

        return redirect('/category/'.$category->id)->with('success', 'Category APDATE!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/user')->with('success', 'Category DELETE');
    }
}
