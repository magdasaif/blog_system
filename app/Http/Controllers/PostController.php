<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\MediaTrait;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //====================================================
    use MediaTrait;
    //====================================================
    public function index(){
        // $posts = Post::get();
        $posts = auth()->user()->posts()->orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts'));
    }
    //====================================================
    public function create(){
        return view('posts.create');
    }
    //====================================================
    public function store(PostRequest $request){
        try {
            DB::beginTransaction();
            $post= Post::create([
                'user_id'       => auth()->user()->id,
                'title'         => $request->title,
                'content'       => $request->content,
            ]);
            
            //upload image if user choose it
            if(isset($request->image)){$this->storeMediaWithMediaLibrary($request,$post,'image','post_collection');}
            
            DB::commit();
            return redirect('posts')->with('success', 'Added Done Sucessfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    //====================================================
    public function show(string $id) {
        //
    }
    //====================================================
    public function edit(Post $post){
        return view('posts.update', compact('post'));
    }
    //====================================================
    public function update(PostRequest $request, string $id){
        try {
            DB::beginTransaction();
            Post::find($id)->update([
                'title'         => $request->title,
                'content'       => $request->content,
            ]);
            DB::commit();
            return redirect('posts')->with('success', 'Updated Done Sucessfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }
    //====================================================
    public function destroy(Post $post){
        $post->delete();
        return redirect('posts')->with('success', 'Deleted Done Sucessfully');
    }
    //====================================================
}
