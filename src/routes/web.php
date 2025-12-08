<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'show');
    });


//Route::controller(AdminBlogController::class)->group(function () {
//    Route::get('/admin/blog', 'show');
//});

//
Route::group([ 'prefix' => 'admin'], function (){
    Route::controller(AdminBlogController::class)->group(function () {
        Route::get('/blog', 'show');
    });
});

Auth::routes();

