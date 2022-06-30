<?php

use App\Http\Controllers\FieldController;

Route::controller(FieldController::class)->group(function () {
    Route::get('fields', 'index')->middleware('auth:admin')->can('list-fields');
    Route::post('fields', 'store')->middleware('auth:admin')->can('create-field');
    Route::get('fields/{id}', 'edit')->middleware('auth:admin')->can('edit-field');
    Route::put('fields/{id}', 'update')->middleware('auth:admin')->can('edit-field');
    Route::delete('fields/{id}', 'destroy')->middleware('auth:admin')->can('delete-field');
});
