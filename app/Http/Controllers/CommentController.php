<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $ticket = $request->user()->comments()->create($request->all());
        $ticket->save();
        return back();
    }

}
