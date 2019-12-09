<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if (auth()->user()->roles->role){
            $role = auth()->user()->roles->role;
            if ($role == 'admin') {
                $categories = Category::all();
                $users = User::all();
                $user = auth()->user();
                return view('admin.index', compact('role', 'users', 'user', 'categories'));
            } elseif ($role == 'editor') {
                $user = auth()->user();
                $categories=[];
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
    public function edit(User $user)
    {
        $role = auth()->user()->roles->role;
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
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => ['required', 'alpha', 'string', 'max:255'],
            'last_name' => ['required', 'alpha', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'integer']
        ]);

        $user->update($data);

        return redirect('/user')->with('success', 'User edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('success', 'User DELETE');
    }
}
