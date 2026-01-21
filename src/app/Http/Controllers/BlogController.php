<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(6);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
        return view('blog.index', compact('posts','likedPosts'));

    }

    public function show(Post $post): View
    {
        Carbon::setLocale('ru_RU');
        $date = Carbon::parse($post->created_at);
        $dateAndCommentsCount =( $date->translatedFormat('F').
            ' • '.
            $date->day .
            ' • '.
            $date->year .
            ' • '.
            $date->format('H:i').
            ' • '.
            'Comments '.
            $post->comments->count() );
        $date->translatedFormat('F');

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        return view('blog.single', compact('post','dateAndCommentsCount','relatedPosts'));

    }
}
