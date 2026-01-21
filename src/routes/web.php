<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Personal\CommentsController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'show');
    });


//Route::controller(AdminBlogController::class)->group(function () {
//    Route::get('/admin/blog', 'show');
//});

Route::group([ 'prefix' => 'personal','middleware' => ['auth' , 'verified']], function () {

    Route::controller(PersonalController::class)->group(function () {
        Route::get('/', 'index')->name('personal.index');
    });

    Route::group(['prefix' => 'liked'] , function () {
        Route::controller(LikedController::class)->group(function () {
            Route::get('', 'index') ->name('personal.liked');
//            Route::get('/create', 'create') ->name('account.create');
//            Route::post('', 'store') ->name('account.store');
//            Route::get('/{category}', 'show') ->name('account.show');
//            Route::get('/{category}/edit', 'edit') ->name('account.edit');
//            Route::patch('/{category}', 'update') ->name('account.update');
            Route::delete('/{post}', 'delete') ->name('personal.liked.delete');
        });
    });

    Route::group(['prefix' => 'comments'] , function () {
        Route::controller(CommentsController::class)->group(function () {
            Route::get('', 'index') ->name('personal.comments');
//            Route::get('/create', 'create') ->name('account.create');
//            Route::post('', 'store') ->name('account.store');
//            Route::get('/{category}', 'show') ->name('account.show');
//            Route::get('/{category}/edit', 'edit') ->name('account.edit');
//            Route::patch('/{category}', 'update') ->name('account.update');
//            Route::delete('/{category}', 'delete') ->name('account.delete');
        });
    });

});

Route::group([ 'prefix' => 'admin' , 'middleware' => ['auth' ,'admin', 'verified']], function (){

    Route::controller(AdminBlogController::class)->group(function () {
            Route::get('/blog', 'show')->name('admin.blog');
    });

    Route::group([ 'prefix' => 'categories'], function (){
        Route::controller(AdminCategoryController::class)->group(function () {
            Route::get('', 'index') ->name('admin.category.index');
            Route::get('/create', 'create') ->name('admin.category.create');
            Route::post('', 'store') ->name('admin.category.store');
            Route::get('/{category}', 'show') ->name('admin.category.show');
            Route::get('/{category}/edit', 'edit') ->name('admin.category.edit');
            Route::patch('/{category}', 'update') ->name('admin.category.update');
            Route::delete('/{category}', 'delete') ->name('admin.category.delete');
        });
    });

    Route::group([ 'prefix' => 'tags'], function (){
        Route::controller(AdminTagController::class)->group(function () {
            Route::get('', 'index') ->name('admin.tag.index');
            Route::get('/create', 'create') ->name('admin.tag.create');
            Route::post('', 'store') ->name('admin.tag.store');
            Route::get('/{tag}', 'show') ->name('admin.tag.show');
            Route::get('/{tag}/edit', 'edit') ->name('admin.tag.edit');
            Route::patch('/{tag}', 'update') ->name('admin.tag.update');
            Route::delete('/{tag}', 'delete') ->name('admin.tag.delete');
        });
    });

    Route::group([ 'prefix' => 'posts'], function (){
        Route::controller(AdminPostController::class)->group(function () {
            Route::get('', 'index') ->name('admin.post.index');
            Route::get('/create', 'create') ->name('admin.post.create');
            Route::post('', 'store') ->name('admin.post.store');
            Route::get('/{post}', 'show') ->name('admin.post.show');
            Route::get('/{post}/edit', 'edit') ->name('admin.post.edit');
            Route::patch('/{post}', 'update') ->name('admin.post.update');
            Route::delete('/{post}', 'delete') ->name('admin.post.delete');
        });
    });

    Route::group([ 'prefix' => 'users'], function (){
        Route::controller(AdminUserController::class)->group(function () {
            Route::get('', 'index') ->name('admin.user.index');
            Route::get('/create', 'create') ->name('admin.user.create');
            Route::post('', 'store') ->name('admin.user.store');
            Route::get('/{user}', 'show') ->name('admin.user.show');
            Route::get('/{user}/edit', 'edit') ->name('admin.user.edit');
            Route::patch('/{user}', 'update') ->name('admin.user.update');
            Route::delete('/{user}', 'delete') ->name('admin.user.delete');
        });
    });
});

Auth::routes(['verify' => true]);
//Auth::routes();

