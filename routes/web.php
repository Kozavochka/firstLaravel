<?php

use App\Http\Controllers\Admin\AdminClubController;
use App\Http\Controllers\Admin\AdminGameController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\GameController;
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
    return view('home');
});

Route::resource('sponsors',SponsorController::class)->names('sponsors');

Route::get('games/export/{game}',[GameController::class, 'pdf_export'])->name('pdf_export_games');
Route::resource('games', GameController::class);

Route::get('clubs/export',[ClubController::class, 'export'])->name('export_clubs');
Route::get('clubs/pdf-export',[ClubController::class, 'pdf_export'])->name('pdf_export_clubs');
Route::resource('clubs',ClubController::class)->names('clubs');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
