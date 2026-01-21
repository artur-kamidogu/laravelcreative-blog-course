<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;

class AdminBlogController extends Controller
{
    public function show(): View
    {
        $data = [];
        $data['usersCount'] = count(User::all());
        $data['postsCount']= count(Post::all());
        $data['categoriesCount']= count(Category::all());
        $data['tagsCount']= count(Tag::all());

        return view('admin.blog',compact('data'));
    }
}
