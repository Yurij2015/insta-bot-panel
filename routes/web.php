<?php

use App\Http\Controllers\Api\InstProfileFollowersController;
use App\Http\Controllers\Api\InstProfileInfoController;
use App\Http\Controllers\Api\InstSearchController;
use App\Http\Controllers\Api\InstSearchResultController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', static function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('profiles', ProfileController::class);
    Route::get('/inst-profile-followers', [InstProfileFollowersController::class, 'index'])->name('inst-profile-followers');
    Route::get('/inst-search', [InstSearchController::class, 'index'])->name('inst-search');
    Route::get('/inst-search-result', [InstSearchResultController::class, 'index'])->name('inst-search-result');
    Route::get('/inst-profile-info', [InstProfileInfoController::class, 'index'])->name('inst-profile-info');
    Route::get('/personal-profile-info/{profile}', [ProfileController::class, 'personalProfileInfo'])->name('personal-profile-info');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
