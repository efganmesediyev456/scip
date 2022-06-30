<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



use Illuminate\Support\Facades\Route;


Route::group(array('middleware' => ['web']), function () {
    Route::post('suggest',[\App\Http\Controllers\Forms\FormController::class,'suggest'])->name('foo');
    Route::post('industrial_project',[\App\Http\Controllers\Forms\FormController::class,'industrial_project']);
    Route::post('agricultural_project',[\App\Http\Controllers\Forms\FormController::class,'agricultural_project']);


});

//Route::post('work-apply',\App\Http\Controllers\Forms\WorkApplyController::class)->name('work-apply');
//Route::post('offers',\App\Http\Controllers\Forms\OffersController::class)->name('offers');



?>
