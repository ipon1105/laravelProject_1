<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentAddController extends Controller
{
    public function func(Request $request) {
        $comment = new Comment();

        $comment->user_id = Auth::id();
        $comment->note_id = $request->input('note_id');
        $comment->content = $request->input('comment');
        $comment->save();
    
        $result = 'good';
        return response($result)->header('Content-Type', 'text/xml');
    }
}
