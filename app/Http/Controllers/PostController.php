<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function home()
    {
        return view('vueApp');
    }

    public function index()
    {
        return Post::orderBy('id', 'desc')->get();
    }


}
