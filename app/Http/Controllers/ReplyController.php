<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        $reply = Reply::create([
            'reply' => $request->reply,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id
        ]);
        return response()->json(['success1'=> $reply]);
    }
}
