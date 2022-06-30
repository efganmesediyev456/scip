<?php

use App\Http\Controllers\Forms\FormController;
use App\Models\Contact;

Route::controller(FormController::class)->group(function () {
    Route::get('contacts', 'getApi')->middleware('auth:admin');
    Route::get('agricultural_projects', 'getAgricultural_projects')->middleware('auth:admin');
    Route::get('industrial_projects', 'getIndustrial_projects')->middleware('auth:admin');
    Route::delete('contacts/{id}', 'destroy')->middleware('auth:admin');
    Route::delete('agriculture_projects/{id}', 'agriculture_projectsDestroy')->middleware('auth:admin');
    Route::delete('industrial_projects/{id}', 'industrial_projectsDestroy')->middleware('auth:admin');

});
