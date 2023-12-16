<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        $filename = time().'.'.$request->image->getClientOriginalName();

        $username = auth()->user()->username;
        $request->file('image')->storeAs(
         'posts/'. $username,
         $filename,
         'public');
        
        $post->image = 'storage/posts/'. $username.'/'.$filename;
        $post->description = is_null($request->description) ? "" : $request->description;
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect(route('home'));
    }

    public function show($id) {
        $user_id = auth()->user()->id;
        $post = Post::find($id);
        $comments = Comment::join('users','users.id','=','comments.user_id')
                           ->select('users.username', 'comments.comment')
                           ->where('users.id', $user_id)
                           ->where('comments.post_id', $id)
                           ->get();

        return view('social.show', ['post'=> $post, 'comments'=> $comments]);
    }

    public function edit($id) {
        return view('social.edit')->with('post', Post::find($id));
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);
        $username = auth()->user()->username;
        
        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->getClientOriginalName();

            unlink($post->image);

            $request->file('image')->storeAs(
                'posts/'. $username,
                $filename,
                'public');
            
            $post->image = 'storage/posts/'. $username.'/'.$filename;
        }
        $post->description = is_null($request->description) ? "" : $request->description;
        
        $post->update();
        return redirect(route('home'));
    }

    public function delete($id) {
        $post = Post::find($id);
        Comment::where('post_id', $post->id)->delete();
        unlink($post->image);
        $post->delete();
        return redirect(route('home'));
    }
}
