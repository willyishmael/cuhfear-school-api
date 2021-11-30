<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentRegistrationController;

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

    Route::get('logout', [UserController::class, 'logout'])->name('auth.logout');

    Route::get('user', [UserController::class, 'user'])->name('auth.user');

    Route::apiResources([
        'human-resource' => HumanResourceController::class,
        'student' => StudentController::class,
        'post' => PostController::class,
        'student-registration' => StudentRegistrationController::class
    ]);

    Route::get('/post/category/{category}', [PostController::class, 'category']);
    Route::get('/post-category', [PostController::class ,'listCategory']);

});
