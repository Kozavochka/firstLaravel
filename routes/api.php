<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\ClubSponsorController;
use App\Http\Controllers\ClubsSponsorController;
use App\Http\Controllers\InfoPlayController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SponsorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('clubs',ClubController::class);
Route::resource('players',PlayerController::class);

//Посредник у группы рутов
Route::group(['middleware' => 'test'], function (){
    Route::resource('sponsors',SponsorController::class);
});


