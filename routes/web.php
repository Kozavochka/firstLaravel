<?php

use App\Http\Controllers\Admin\AdminClubController;
use App\Http\Controllers\Admin\AdminGameController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminSponsorController;
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

Route::resource('sponsors',SponsorController::class)->names('sponsors');

Route::get('clubs/export',[ClubController::class, 'export'])->name('export_clubs');
Route::get('clubs/pdf-export',[ClubController::class, 'pdf_export'])->name('pdf_export_clubs');
Route::resource('clubs',ClubController::class)->names('clubs');


Route::group(['prefix' => 'admin'], function (){
    Route::resource('games', AdminGameController::class)->names('admin.games');
    Route::resource('sponsors',AdminSponsorController::class)->names('admin.sponsors');
    Route::resource('clubs',AdminClubController::class)->names('admin.clubs');
    Route::get('/',[AdminIndexController::class,'index'])->name('admin');
});
