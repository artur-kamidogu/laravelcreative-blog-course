<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AdminTagController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function show(Category $category): View
    {
        return view('admin.category.show',compact('category'));
    }
    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Category::firstOrCreate(['title'=>$data['title']]); // проверка по ключу и значению
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category): View
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(Category $category,UpdateRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.show', compact('category'));
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

}
