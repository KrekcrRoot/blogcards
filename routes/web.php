<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;

Route::get('/', function () {
    return view('app');
});

Route::get('/{post}', function(Post $post) {
    return view('app', ['selectedPost' => $post]);
});
