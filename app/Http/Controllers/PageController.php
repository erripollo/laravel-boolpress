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

}
