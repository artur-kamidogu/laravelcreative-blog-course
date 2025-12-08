<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AdminBlogController extends Controller
{
    public function show(): View
    {
        return view('admin.blog');
    }
}
