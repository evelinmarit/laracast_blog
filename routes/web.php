<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\MustBeAdministrator;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get("posts/{post:slug}", [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Admin
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware(MustBeAdministrator::class);
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware(MustBeAdministrator::class);
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware(MustBeAdministrator::class);
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware(MustBeAdministrator::class);
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware(MustBeAdministrator::class);
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware(MustBeAdministrator::class);
