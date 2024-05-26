<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get("posts/{post}", function ($id) {

    return view('post', [
        'post' => Post::FindOrFail($id)
    ]);
});
