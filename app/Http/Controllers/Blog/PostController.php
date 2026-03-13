<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // public function index()
    // {
    //     $posts = Post::published()
    //         ->latest()
    //         ->paginate(10);

    //     return view('blog.index', compact('posts'));
    // }
    public function index(Request $request)
    {
        $posts = Post::published()
            ->search($request->search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        abort_if(!$post->is_published, 404);
        return view('blog.show', compact('post'));
    }

}
