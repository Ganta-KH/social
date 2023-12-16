<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id) {
        $comment = new Comment();
        $user_id = auth()->user()->id;

        $comment->post_id = $id;
        $comment->user_id = $user_id;
        $comment->comment = $request->comment;

        $comment->save();
        return redirect(route('social.show', $id));
    }
}
