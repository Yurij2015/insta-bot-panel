<?php

use App\Http\Controllers\Api\InstProfileFollowersController;
use App\Http\Controllers\Api\InstProfileInfoController;
use App\Http\Controllers\GetFollowersTaskController;
use App\Http\Controllers\GetFullIgUsersDataTaskController;
use App\Http\Controllers\InstSearchController;
use App\Http\Controllers\InstSearchResultController;
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
    Route::get('/inst-profile-followers', [InstProfileFollowersController::class, 'index'])
        ->name('inst-profile-followers'); // remove in future (moved to console command)
    Route::get('/inst-search', [InstSearchController::class, 'index'])->name('inst-search');
    Route::get('/inst-search-result', [InstSearchResultController::class, 'index'])->name('inst-search-result');
    Route::get('/inst-profile-info', [InstProfileInfoController::class, 'index'])->name('inst-profile-info');
    Route::get('/personal-profile-info/{profile}', [ProfileController::class, 'personalProfileInfo'])->name('personal-profile-info');
    Route::post('/handle-search', [InstSearchController::class, 'handleSearch'])->name('handle-search');
    Route::get('/ig-hashags/{searchResult}', [InstSearchResultController::class, 'igHashtags'])->name('ig-hashtags');
    Route::get('/ig-places/{searchResult}', [InstSearchResultController::class, 'igPlaces'])->name('ig-places');
    Route::get('/ig-users/{searchResult}', [InstSearchResultController::class, 'igUsers'])->name('ig-users');
    Route::post('/inst-search-result/delete/{searchResult}', [InstSearchResultController::class, 'deleteSearchResult'])
        ->name('inst-search-result.delete');
    Route::get('/proxy-image/{url}', [InstSearchResultController::class, 'proxyImage'])
        ->name('proxy-image')->where('url', '.*');
    Route::post('/ig-user.set-get-followers-task/{igUser}', [InstProfileFollowersController::class, 'setGetFollowersTask'])
        ->name('ig-user.set-get-followers-task');
    Route::get('ig-users.show-followers/{igUser}', [InstProfileFollowersController::class, 'showFollowers'])
        ->name('ig-users.show-followers');
    Route::post('/ig-users.set-get-full-data-task/{searchResult}', [InstSearchResultController::class, 'setGetFullDataTask'])
        ->name('ig-users.set-get-full-data-task');
    Route::get('get-followers-tasks', [GetFollowersTaskController::class, 'index'])->name('get-followers-tasks');
    Route::get('get-full-ig-users-data-tasks', [GetFullIgUsersDataTaskController::class, 'index'])->name('get-full-ig-users-data-tasks');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
