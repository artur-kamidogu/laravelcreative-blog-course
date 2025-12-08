<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class BlogController extends Controller
{
    public function show(): View
    {
        return view('blog.index');

    }
}
