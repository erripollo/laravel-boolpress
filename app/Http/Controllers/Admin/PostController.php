<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();

        $validated = $request->validate([
            'title' => 'required | min:5 | max:100',
            'summary' => 'nullable | min:5 | max:255',
            'image' => 'nullable | image | max:150',
            'body' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $file_path = Storage::put('posts_images', $validated['image']);
            $validated['image'] = $file_path; 
        }
        
        Post::create($validated);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //dd($request->all(), $post);
        $validated = $request->validate([
            'title' => 'required | min:5 | max:100',
            'summary' => 'nullable | min:5 | max:255',
            'image' => 'nullable | image | max:150',
            'body' => 'nullable'
        ]);

        if (array_key_exists('image', $validated)) {
            $file_path = Storage::put('posts_images', $validated['image']);
            $validated['image'] = $file_path;
            Storage::delete($post['image']);
        }

        $post->update($validated);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
