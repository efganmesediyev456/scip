<?php

use App\Http\Controllers\FieldValueController;

Route::controller(FieldValueController::class)->prefix('fields/{id}')->group(function () {
    Route::get('values', 'index')->middleware('auth:admin')->can('list-field-values');
    Route::post('values', 'store')->middleware('auth:admin')->can('create-field-values');
    Route::get('values/{fieldValueId}', 'show')->middleware('auth:admin')->can('edit-field-values')->whereNumber('fieldValueId');
    Route::put('values/{fieldValueId}', 'update')->middleware('auth:admin')->can('edit-field-values')->whereNumber('fieldValueId');
    Route::delete('values/{fieldValueId}', 'destroy')->middleware('auth:admin')->can('edit-field-values')->whereNumber('fieldValueId');
});
