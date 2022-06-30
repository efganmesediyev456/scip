<?php

use App\Http\Controllers\PageController;
use App\Models\Page;

Route::controller(PageController::class)->group(function () {
    Route::get('pages/{pageType}/fields', 'fields')->middleware('auth:admin')
        ->can('list-page-fields')->whereIn('pageType', Page::TYPES);

    Route::get('pages', 'index')->middleware('auth:admin')->can('list-pages');

    Route::post('pages/{pageType}', 'store')->middleware('auth:admin')->can('create-page')
        ->whereIn('pageType', Page::TYPES);

    Route::get('pages/{id}/show', 'show')->middleware('auth:admin')->can('update-page');

    Route::put('pages/{id}', 'update')->middleware('auth:admin')->can('update-page');

    Route::patch('pages/{id}/publish', 'publish')->middleware('auth:admin')->can('publish-page');
    Route::patch('pages/{id}/hide', 'hide')->middleware('auth:admin')->can('hide-page');
});
