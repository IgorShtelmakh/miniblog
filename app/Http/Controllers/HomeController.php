<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use VerumConsilium\Browsershot\Facades\Screenshot;

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

        Screenshot::loadView('view', ['post' => $post])
                   ->useJPG()
                   ->margins(20, 0, 0, 20)
                   ->storeAs(('public/storage/previews/posts'), "{$postId}.jpg");

        return view('view', [
            'post' => $post
        ]);
    }    
}
