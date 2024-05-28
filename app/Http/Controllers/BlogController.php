<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function get()
    {
        $blogs = Blog::get();
        return view('home', ['blogs' => $blogs]);
    }

    public function post(BlogPostRequest $request)
    {
        $data = $request->getData();

        $blog = Blog::create([
            'title' => $data['title'],
            'title_image' => $data['title_image'],
            'description' => $data['description'],
            'slug' => $data['slug'],
            'body' => $data['body'],
            'status' => $data['status'],
            'tags' => $data['tags'],
            'view_count' => 1

        ]);
        

        return response()->json($blog, 201);
    }

    public function getBySlug(string $slug) {
        $blog =  Blog::where('slug', $slug)->first();
        return view('blog', ['title' => $blog->title, 'description' => $blog->description, 'body' => $blog->body]);
        return $blog->title;
        return $slug;
    }
}
