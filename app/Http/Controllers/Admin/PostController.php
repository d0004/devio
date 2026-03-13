<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(12);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'short_description' => ['required'],
            'content' => ['required'],
            'published_at' => ['nullable','date'],
            'image' => ['nullable','image','max:2048'],
        ]);

        $data['slug'] = Str::slug($data['title']);

        $post = Post::create($data);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image()->create([
                'path' => $path
            ]);
        }

        return redirect()
            ->route('posts.index')
            ->with('success','Post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'short_description' => ['required'],
            'content' => ['required'],
            'published_at' => ['nullable','date'],
            'image' => ['nullable','image','max:2048'],
        ]);

        // $data['slug'] = Str::slug($data['title']);

        $post->update($data);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            if ($post->image) {
                $post->image->update(['path' => $path]);
            } else {
                $post->image()->create(['path' => $path]);
            }
        }

        return redirect()
            ->route('posts.index')
            ->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success','Post deleted');
    }
}
