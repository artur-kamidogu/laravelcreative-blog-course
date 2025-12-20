<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\PostService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class AdminPostController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }
    public function show(Post $post): View
    {
        return view('admin.post.show',compact('post'));
    }
    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories','tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }

    public function edit(Post $post): View
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit',compact('post','tags','categories'));
    }

    public function update(Post $post,UpdateRequest $request)
    {

        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return view('admin.post.show', compact('post'));
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

}
