<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $query = Post::orderBy('created_at','desc');
        if (isset($request->search) && !empty($request->search)) {
            $query->whereLike('title', $request->search)
                ->orWhereLike('content', $request->search);
        }
        $posts=$query->paginate(10);
        $title = 'All Posts';
        return view('posts.index', compact('posts','title'));
    }
}
