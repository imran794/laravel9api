<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserapiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users/{id?}',[UserapiController::class, 'Users']);

// single api user create
Route::post('/users-add',[UserapiController::class, 'UsersAdd']);

// multipe api user create  

Route::post('/user-multiple-add',[UserapiController::class, 'UserMultipleAdd']);