<?php

use App\Http\Controllers\FileManagerController;

Route::controller(FileManagerController::class)->group(function () {
    Route::post('file-manager/upload', 'upload')->middleware('auth:admin');
    Route::post('file-manager/editor', 'editorUpload')->middleware('auth:admin');
});
