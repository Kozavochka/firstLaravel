<?php

use App\Http\Controllers\Admin\AdminClubController;
use App\Http\Controllers\Admin\AdminGameController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;


Route::resource('games', AdminGameController::class)->names('admin.games');

Route::get('/sponsor-clubs', [AdminSponsorController::class,'sponsor_clubs'])->name('sponsor-clubs');
Route::resource('sponsors',AdminSponsorController::class)->names('admin.sponsors');

Route::resource('clubs',AdminClubController::class)->names('admin.clubs');
Route::get('/',[AdminIndexController::class,'index'])->name('admin');

