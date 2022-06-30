<?php

use App\Http\Controllers\Admin2FAController;

Route::controller(Admin2FAController::class)->group(function () {
    Route::get('admin/2fa', 'tfaDetails')->middleware('auth:admin');
    Route::post('admin/2fa', 'tfaEnable')->middleware('auth:admin');
    Route::delete('admin/2fa', 'tfaDisable')->middleware('auth:admin');

    Route::get('admin/2fa/sms', 'smsDetails')->middleware('auth:admin');
    Route::patch('admin/2fa/sms', 'sendOTP')->middleware('auth:admin');
    Route::post('admin/2fa/sms', 'smsEnable')->middleware('auth:admin');
    Route::delete('admin/2fa/sms', 'smsDisable')->middleware('auth:admin');
});
