<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\ClubController;
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
Route::resource('clubs',ClubController::class)->names('clubs');
Route::get('main',[AdminController::class,'index'])->name('main');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::resource('/sponsors',AdminSponsorController::class)->names('admin.sponsors');
});
