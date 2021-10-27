<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class,'login'])->name('auth.login');

/**
 * Login required to access these routes
 */
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');

    Route::get('/user', [UserController::class, 'user'])->name('auth.user');

    Route::resource('/human-resource', HumanResourceController::class)->except(['create', 'edit']);
    Route::resource('/student', StudentController::class)->except(['create', 'edit']);

});
