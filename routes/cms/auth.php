<?php

use App\Http\Controllers\AdminAuthController;

Route::controller(AdminAuthController::class)->group(function () {
    Route::post('admin/auth', 'login');
    Route::patch('admin/auth', 'refresh');
    Route::get('admin/auth', 'me')->middleware('auth:admin');
    Route::delete('admin/auth', 'logout')->middleware('auth:admin');
});
