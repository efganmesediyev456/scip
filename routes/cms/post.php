<?php

use App\Http\Controllers\PostController;
use App\Models\Post;

Route::controller(PostController::class)->group(function () {
    Route::get('posts/{postType}/fields', 'fields')->middleware('auth:admin')
        ->can('list-post-fields')->whereIn('postType', Post::TYPES);

    Route::get('posts/{postType}/columns', 'columns')->middleware('auth:admin')
        ->can('list-post-columns')->whereIn('postType', Post::TYPES);

    Route::get('posts/{postType}', 'index')->middleware('auth:admin')->can('list-posts')
        ->whereIn('postType', Post::TYPES);

    Route::post('posts/{postType}', 'store')->middleware('auth:admin')->can('create-post')
        ->whereIn('postType', Post::TYPES);

    Route::get('posts/{id}/show', 'show')->middleware('auth:admin')->can('update-post');

    Route::put('posts/{id}', 'update')->middleware('auth:admin')->can('update-post');

    Route::delete('posts/{id}', 'destroy')->middleware('auth:admin')->can('delete-post');
    Route::post('posts/more', 'more');
    Route::post('videogallery/more', 'moreVideo');
    Route::post('photogallery/more', 'morePhoto');
    Route::post('advertisement/more', 'moreAdvertisement ');
    Route::post('logistics/more', 'moreLogistics');
});
