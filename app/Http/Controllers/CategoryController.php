<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user && $user->roles->role == 'admin') {
            $categories = Category::all();
            return view('category.index', ['categories' => $categories]);
        }
        elseif ($user && $user->roles->role == 'editor') {
            $categories = $user->categories->unique();
            return view('category.index', ['categories' => $categories]);
        }
        else {
            return redirect('/neh');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if ($user && $user->roles->role == 'admin'){
            return view('category.create');
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
            'title' => ['required', 'unique:categories,title', 'min:3', 'max:255'],
            'description' => ['required', 'min:5', 'max:10000'],
            'meta_keywords' => ['required', 'min:3', 'max:255'],
            'meta_description' => ['required', 'min:3', 'max:255']
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
        if ($user && $user->roles->role == 'editor') {
            $posts = $category->posts->whereIn('author_id', [$user->id]);
        }
        else {
            $posts = $category->posts;
        }

        return view('category.show', ['category' => $category, 'posts' => $posts]);
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
            return view('category.edit', ['category' => $category]);
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
            'title' => ['required', 'unique:categories,title,'.$category->id, 'min:3', 'max:255'],
            'description' => ['required', 'min:5', 'max:10000'],
            'meta_keywords' => ['required', 'min:3', 'max:255'],
            'meta_description' => ['required', 'min:3', 'max:255']
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
