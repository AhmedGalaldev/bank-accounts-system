<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);





Route::group(['middleware' => ['auth:sanctum','role:Admin']], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::get('/acounts/{account}', [AccountController::class, 'show']);
        Route::put('/accounts/{account}/active',[AccountController::class, 'activeAccount']);
        Route::put('/accounts/{account}/deactive',[AccountController::class, 'deactiveAccount']);


});