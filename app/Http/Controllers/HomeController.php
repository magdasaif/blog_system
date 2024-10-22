<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //retreive all posts
        $posts = Post::orderBy('created_at','desc')->get();
        $title = 'All Posts';
        return view('posts.index', compact('posts','title'));
    }
}
