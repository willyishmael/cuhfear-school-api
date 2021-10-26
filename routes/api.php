<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::resource('/human-resource', HumanResourceController::class)->except(['create', 'edit']);

    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    Route::get('/logout', function (Request $request) {
        return $request->user()->tokens()->where('id', $request->user()->currentAccessToken()->id)->delete();
    });

});


Route::post('/login', [UserController::class,'index']);

