<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        $title = 'All Posts';
        return view('posts.index', compact('posts','title'));
    }
}
