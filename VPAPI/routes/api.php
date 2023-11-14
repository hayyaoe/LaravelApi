<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all_user',[UserController::class, 'getAllUser']);
Route::get('check_password',[UserController::class,'checkPassword']);
Route::post('create_user',[UserController::class,'createUser']);
Route::patch('update_user',[UserController::class,'updateUser']);
Route::delete('delete_user',[UserController::class,'deleteUser']);
