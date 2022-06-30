<?php

use App\Http\Controllers\AdminProfileController;

Route::controller(AdminProfileController::class)->group(function () {
    Route::put('admin/profile', 'updateProfile')->middleware('auth:admin');
    Route::post('admin/password', 'changePassword')->middleware('auth:admin');
    Route::get('admin/session', 'sessions')->middleware('auth:admin');
    Route::delete('admin/session/{id}', 'expireSession')->middleware('auth:admin');
    Route::delete('admin/session', 'expireOtherSessions')->middleware('auth:admin');
});
