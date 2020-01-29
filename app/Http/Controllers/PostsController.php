<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    function show($slug)
    {
        return view('post', ['post' => Post::where('slug', $slug)->firstOrFail()]);
    }
}
