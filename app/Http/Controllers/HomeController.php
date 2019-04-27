<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(3);
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function view(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        return view('view', [
            'post' => $post
        ]);
    }    
}
