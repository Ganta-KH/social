<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        return view("social.create");
    }

    public function store(Request $request) {
        $post = new Post();

        $request->validate([
            "image"=> ['required', 'mimes:jpg,png,gif,jpeg'],
            'description'=> ['nullable','string', 'max:225'],
        ]);

        $username = auth()->user()->username;
        $request->file('image')->storeAs(
         'posts/'. $username,
         $request->image->getClientOriginalName(),
         'public');
        
        $post->image = 'storage/posts/'. $username.'/'.$request->image->getClientOriginalName();
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect(route('home'));
    }

    public function show($id) {
        return view('social.show')->with('post', Post::find($id));
    }
}
