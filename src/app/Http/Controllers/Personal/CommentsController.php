<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use App\Models\User;

class CommentsController extends Controller
{
    public function index(): View
    {
        $comments = auth()->user()->comments;
        return view('personal.comments.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        return view('personal.comments.edit', compact('comment'));
    }

    public function update(Comment $comment, UpdateRequest $request)
    {
        $data = $request->validated();
        $comment->update($data);
//        dd($comment);
        return redirect()->route('personal.comments');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comments');
    }
}
