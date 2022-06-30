<?php

use App\Http\Controllers\SettingsController;

Route::controller(SettingsController::class)->group(function () {
    Route::get('settings', 'index')->middleware('auth:admin')->can('read-settings');
    Route::get('settings/{id}', 'show')->middleware('auth:admin')->can('read-settings');
    Route::put('settings/{id}', 'update')->middleware('auth:admin')->can('update-settings');
});
