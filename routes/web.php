<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*User Controller */
Route::get('login', [UserController::class, 'index']);
Route::post('login/submit', [UserController::class, 'login']);

Route::group(['middleware' => ['session']], function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('registration', [UserController::class, 'registration']);
    Route::post('registration/submit', [UserController::class, 'store']);

    /*Admin Controller */
    Route::get('/', [AdminController::class, 'index']);
    Route::get('profile', [AdminController::class, 'profile']);
    Route::post('profile/submit', [AdminController::class, 'update']);
    Route::post('password/update', [AdminController::class, 'changePass']);
    Route::get('appointment', [AdminController::class, 'appointment']);
    Route::get('doctor/accept/{id}', [AdminController::class, 'accept']);
    Route::get('patient/list', [AdminController::class, 'patientlist']);
    Route::get('patient/add', [AdminController::class, 'patient']);
    Route::post('patient/add/submit', [AdminController::class, 'addpatient']);
    Route::get('doctor/list', [AdminController::class, 'doctorlist']);
    Route::get('doctor/add', [AdminController::class, 'doctor']);
    Route::post('doctor/add/submit', [AdminController::class, 'adddoctor']);
    Route::get('doctor/delete/{id}', [AdminController::class, 'deldoctor']);



    /* Blog */
    Route::get('blog/add', [BlogController::class, 'create']);
    Route::post('blog/store', [BlogController::class, 'store']);
    Route::get('blog/list', [BlogController::class, 'index']);
    Route::get('blog/edit/{id}', [BlogController::class, 'edit']);
    Route::get('blog/delete/{id}', [BlogController::class, 'destroy']);
    Route::patch('blog/update', [BlogController::class, 'update']);
});


/* Clear Memory */
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return '<h1>Cache, Config, View cleared & optimized!</h1>';
});
