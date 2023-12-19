<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view('social.index',['posts'=> $posts, 'user'=> $user]);
    }
}
