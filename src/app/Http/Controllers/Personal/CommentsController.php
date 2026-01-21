<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\View\View;

class CommentsController extends Controller
{
    public function index(): View
    {
        return view('personal.comments.index');
    }
}
