<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class LikedController extends Controller
{
    public function index(): View
    {
        $posts = auth()->user()->likedPosts()->get();
//        dd($posts);
        return view('personal.liked.index',compact('posts'));
    }

    public function delete(Post $post): RedirectResponse
    {
        $posts = auth()->user()->likedPosts()->detach($post->id);
//        dd($posts);
        return redirect()->route('personal.liked');
    }
}
