<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (!empty($user)){
            $categories = Category::all();
            return view('category.index', compact('user', 'categories'));
        } else {
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
        $user = Auth::user();
        if (!empty($user) && $user->roles->role == 'admin'){
            $category = new Category();
            return view('category.create', compact('user', 'category'));
        } else {
            return redirect('/view/errors/neh.php');
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
        $category = new Category();

        $category->title = htmlspecialchars($request->title);
        $category->description = htmlspecialchars($request->description);
        $category->meta_keywords = htmlspecialchars($request->meta_keywords);
        $category->meta_description = htmlspecialchars($request->meta_description);

        $category->save();

        return redirect('/category')->with('success', 'Category CREATE!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!empty(Auth::user()->roles->role)) {
            $role = Auth::user()->roles->role;
            $user = Auth::user();

            if ($role == 'admin') {
                $category = Category::find($id);
                $posts = $category->posts;

                return view('category.show', compact('category', 'posts', 'user', 'role'));

            } elseif ($role == 'editor') {
                $category = Category::find($id);
                $posts_all_cetegory = $category->posts;
                $posts = [];

                foreach ($posts_all_cetegory as $post)
                {
                    /*var_dump($post->user->id);
                    exit;*/
                    if (!empty($post->user->id) == $user->id) {
                        $posts[] = $post;
                    }
                }

                if (!empty($posts)){
                    return view('category.show', compact('category', 'posts', 'user', 'role'));
                } else {
                    $aliarm = 'There are no your height in this category. Want to create?';
                    return view('category.show', compact('category', 'aliarm', 'user', 'role'));
                }

            }
        } else {
            $category = Category::find($id);
            $posts = $category->posts;

            return view('category.show', compact('category', 'posts'));
        }
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
        if (!empty($user) && $user->roles->role == 'admin'){
            $category = Category::find($id);
            return view('category.edit', compact('user', 'category'));
        } else {
            return redirect('/view/errors/neh.php');
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
        $category = Category::find($id);

        $category->title = htmlspecialchars($request->title);
        $category->description = htmlspecialchars($request->description);
        $category->meta_keywords = htmlspecialchars($request->meta_keywords);
        $category->meta_description = htmlspecialchars($request->meta_description);

        $category->save();

        return redirect('/category/{{$category->id}}')->with('success', 'Category APDATE!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/user')->with('success', 'Category DELETE');
    }
}
