<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $posts = $request->user()->posts()->orderByDesc('created_at')->get();
        $categories = Category::get();

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $categories = Category::get();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }


    public function update(Request $request, $postId)
    {
        $categories = Category::get();
        $post = $request->user()->posts()->findOrFail($postId);

        return view('posts.update', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    public function store(Request $request, $postId = null)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        if($postId) {
            $post = $request->user()->posts()->findOrFail($postId);
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);
        } else {
            $request->user()->posts()->create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);            
        }

        return redirect('/posts');
    }


    public function destroy(Request $request, $postId)
    {
        $request->user()->posts()->findOrFail($postId)->delete();
        return redirect('/posts');
    }
}
