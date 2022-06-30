<?php

use App\Http\Controllers\AdminUserController;

Route::controller(AdminUserController::class)->group(function () {
    Route::get('admin/roles', 'roles')->middleware('auth:admin');
    Route::get('admin/users', 'index')->middleware('auth:admin')->can('list-admins');
    Route::post('admin/users', 'store')->middleware('auth:admin')->can('create-admin');
    Route::put('admin/users/{id}', 'update')->middleware('auth:admin')->can('edit-admin');
    Route::get('admin/users/{id}', 'show')->middleware('auth:admin')->can('edit-admin');
    Route::patch('admin/users/{id}/reset', 'resetPassword')->middleware('auth:admin')->can('reset-admin–password');
    Route::delete('admin/users/{id}', 'destroy')->middleware('auth:admin')->can('delete-admin');
});
