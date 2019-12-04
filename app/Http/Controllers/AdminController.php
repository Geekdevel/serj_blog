<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\User;
use App\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(Auth::user()->roles->role)){
            $role = Auth::user()->roles->role;
            if ($role == 'admin') {
                $categories = Category::all();
                $users = User::all();
                $user = Auth::user();
                return view('admin.index', compact('role', 'users', 'user', 'categories'));
            } elseif ($role == 'editor') {
                $user = Auth::user();
                $categories=[];
                $posts = $user->posts;
                foreach ($posts as $post)
                {
                    $categories[] = $post->category;
                }
                $categories = array_unique($categories);
                return view('admin.index', compact('role', 'user', 'categories'));
            } else {
                return view('auth.register');
            }
        } else {
            return view('auth.register');
        }
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
        $role = Auth::user()->roles->role;
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit', compact('user', 'role', 'roles'));
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
        $user = User::find($id);
        $user->first_name = strip_tags($request->first_name);
        $user->last_name = strip_tags($request->last_name);
        $user->email = strip_tags($request->email);

        if (!empty($request->role)) {
            $user->role_id = $request->role;
        }

        $user->save();

        return redirect('/user')->with('success', 'User edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'User DELETE');
    }
}
