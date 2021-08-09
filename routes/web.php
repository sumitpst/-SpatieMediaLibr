<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

Route::get('posts',"PostController@index")->name('posts.index');

Route::get('posts/create',"PostController@create")->name('posts.create');

Route::post('posts/store',"PostController@store")->name('posts.store');
