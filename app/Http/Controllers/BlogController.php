<?php

namespace App\Http\Controllers;

use App\Commons\Constants;
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

    public function getBySlug(string $slug)
    {
        $blog =  Blog::where('slug', $slug)->first();
        return view('blog', ['title' => $blog->title, 'description' => $blog->description, 'body' => $blog->body]);
    }

    public function createNewBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->move(public_path('images/blogtitleimages'), $fileName);

        Blog::create([
            'title' => $request->get('title'),
            'title_image' => '/images/blogtitleimages/' . $fileName,
            'description' => $request->get('description'),
            'slug' => $request->get('slug'),
            'body' => 'content goes here',
            'status' => Constants::$DRAFT,
            'tags' => ["abc", "def"],
            'view_count' => 1,
            'author_id' => $request->cookie('user_id')
        ]);

        return redirect()->route('author-dashboard');
    }

    public function getPreview(string $slug)
    {
        $blog =  Blog::where('slug', $slug)->first();
        return view('blog', ['title' => $blog->title, 'description' => $blog->description, 'body' => $blog->body]);
    }

    public function getEditView(string $slug)
    {
        $blog =  Blog::where('slug', $slug)->first();
        return view('edit-blog', ['blog' => $blog]);
    }

    public function updateBlog(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'body' => 'required|string'
        ]);
        try {
            $blog = Blog::where('slug', $slug)
                ->where('author_id', $request->cookie('user_id'))
                ->firstOrFail();

            $blog->title = $request->get('title');
            $blog->description = $request->get('description');
            $blog->body = $request->get('body');
            $blog->save();

            return redirect()->route('edit-view')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
