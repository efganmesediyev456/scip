<?php

use App\Http\Controllers\RedirectController;

Route::controller(RedirectController::class)->group(function () {
    Route::get('redirect', 'index')->middleware('auth:admin')->can('list-redirects');
    Route::post('redirect', 'store')->middleware('auth:admin')->can('create-redirect');
    Route::delete('redirect/{id}', 'destroy')->middleware('auth:admin')->can('delete-redirect');
});
