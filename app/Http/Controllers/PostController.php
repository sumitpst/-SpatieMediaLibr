<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller{

    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $valiator = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        $post = Post::create(
         [ "text" =>  $request->body,"title" => $request->title,"user_id"=>1 ]
        );
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('posts.index');

    }
}
