<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Category;
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
            'image' => 'nullable | image | max:250',
            'category_id' => 'nullable | exists:categories,id',
            'tags' => 'nullable | exists:tags,id',
            'body' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $file_path = Storage::put('posts_images', $validated['image']);
            $validated['image'] = $file_path; 
        }
        
        $post = Post::create($validated);
        $post->tags()->attach($request->tags);
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
            'image' => 'nullable | image | max:250',
            'category_id' => 'nullable | exists:categories,id',
            'tags' => 'nullable | exists:tags,id',
            'body' => 'nullable'
        ]);

        if (array_key_exists('image', $validated)) {
            $file_path = Storage::put('posts_images', $validated['image']);
            $validated['image'] = $file_path;
            Storage::delete($post['image']);
        }

        $post->update($validated);
        $post->tags()->sync($request->tags);
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
        $post->tags()->detach();
        Storage::delete($post['image']);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
