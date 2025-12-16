<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AdminTagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }
    public function show(Tag $tag): View
    {
        return view('admin.tag.show',compact('tag'));
    }
    public function create(): View
    {
        return view('admin.tag.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Tag::firstOrCreate(['title'=>$data['title']]); // проверка по ключу и значению
        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tag.edit',compact('tag'));
    }

    public function update(Tag $tag, UpdateRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('admin.tag.show', compact('tag'));
    }

    public function delete(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }

}
