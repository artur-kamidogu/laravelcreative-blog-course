<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class AdminPostController extends Controller
{
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
        try {
            $data = $request->validated();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image'] );

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        } catch (\Exception $exception) {
            abort(404);
        }
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
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
        }

        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
        }

        $post->update($data);
        $post->tags()->sync($tagIds);
        return view('admin.post.show', compact('post'));
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

}
