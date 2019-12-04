<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('guest.index', compact('categories'));
    }
}
