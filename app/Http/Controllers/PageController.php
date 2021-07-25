<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('id', 'DESC')->take(5)->get();
        //dd($posts);
        return view('guest.welcome', compact('posts'));
    }



    public function search(Request $request)
    {
        //dd($request);

        $search = $request->input('search');
        //dd($search);

        $posts = Post::query()
            ->orderBy('id', 'DESC')
            ->where('title', 'LIKE', "%{$search}")
            ->orWhere('summary', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();


    
        return view('guest.search', compact('posts'));
    }
}
