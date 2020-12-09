<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;



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

Route::get('/', function () {

});

Route::get('movie', [MovieController::class, 'index']);
Route::get('movie/{id}', [MovieController::class, 'show']);
Route::get('movie/genre/{genre}', [MovieController::class, 'getByGenre']);


