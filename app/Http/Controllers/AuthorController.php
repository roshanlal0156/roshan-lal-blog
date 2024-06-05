<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function dashboard(Request $request) {
        $blogs = Blog::where('author_id', $request->cookie('user_id'))->get();
        return view('author/dashboard', ['blogs' => $blogs]);
    }
}
