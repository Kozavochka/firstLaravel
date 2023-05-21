<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sponsor',SponsorController::class)->names('sponsors');

Route::get('clubs/prepare-export',[ClubController::class, 'prepareExport'])->name('prepare-export');
Route::get('clubs/export',[ClubController::class, 'export'])->name('export');
Route::resource('clubs',ClubController::class)->names('clubs');


Route::group(['prefix' => 'admin'], function (){
    Route::resource('sponsors',SponsorController::class)->names('sponsors');
});
