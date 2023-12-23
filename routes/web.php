<?php

use App\Http\Controllers\Api\InstProfileFollowersController;
use App\Http\Controllers\Api\InstProfileInfoController;
use App\Http\Controllers\GetFollowersTaskController;
use App\Http\Controllers\GetFullIgUsersDataTaskController;
use App\Http\Controllers\GetProfilesDataFromListController;
use App\Http\Controllers\GoThroughProfilesInBrowserController;
use App\Http\Controllers\GoThroughSearchProfilesInBrowserController;
use App\Http\Controllers\InstSearchController;
use App\Http\Controllers\InstSearchResultController;
use App\Http\Controllers\OpenInBrowserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileListController;
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
    Route::delete('/inst-search-result/delete/{searchResult}', [InstSearchResultController::class, 'deleteSearchResult'])
        ->name('inst-search-result.delete');
    Route::delete('/ig-user/delete/{igUser}', [InstSearchResultController::class, 'igUserDelete'])
        ->name('ig-user.delete');
    Route::get('/proxy-image/{url}', [InstSearchResultController::class, 'proxyImage'])
        ->name('proxy-image')->where('url', '.*');
    Route::post('/ig-user.set-get-followers-task-for-search/{igUser}', [InstProfileFollowersController::class, 'setGetFollowersTaskForSearch'])
        ->name('ig-user.set-get-followers-task-for-search');
    Route::post('/set-get-followers-task-for-list/{profileList}/{profileInfo}', [InstProfileFollowersController::class, 'setGetFollowersTaskForProfileOfList'])
        ->name('set-get-followers-task-for-list');
    Route::post('/set-get-profiles-of-list-data/{profileList}/{profileInfo}', [InstProfileFollowersController::class, 'setGetProfilesOfListData'])
        ->name('set-get-profiles-of-list-data');
    Route::get('ig-users.show-followers/{igUser}', [InstProfileFollowersController::class, 'showFollowers'])
        ->name('ig-users.show-followers');
    Route::post('/ig-users.set-get-full-data-task/{searchResult}', [InstSearchResultController::class, 'setGetFullDataTask'])
        ->name('ig-users.set-get-full-data-task');
    Route::get('get-followers-tasks', [GetFollowersTaskController::class, 'index'])->name('get-followers-tasks');
    Route::get('get-full-ig-users-data-tasks', [GetFullIgUsersDataTaskController::class, 'index'])->name('get-full-ig-users-data-tasks');
    Route::get('/open-in-browser/{profile}', OpenInBrowserController::class)->name('open-in-browser');
    Route::get('/profile-lists', [ProfileListController::class, 'index'])->name('profile-lists');
    Route::get('/add-profiles-list', [ProfileListController::class, 'addProfileList'])->name('add-profiles-list');
    Route::post('/store-profiles-list', [ProfileListController::class, 'storeProfilesList'])->name('store-profiles-list');
    Route::delete('/profile-lists/delete/{profileList}', [ProfileListController::class, 'deleteProfileList'])
        ->name('profile-lists.delete');
    Route::get('get-profiles-data-from-list', [GetProfilesDataFromListController::class, 'index'])->name('get-followers-tasks');
    Route::get('/edit-profiles-list/{profileList}', [ProfileListController::class, 'editProfileList'])->name('edit-profiles-list');
    Route::post('/update-profiles-list/{profileList}', [ProfileListController::class, 'updateProfilesList'])->name('update-profiles-list');
    Route::post('/set-get-profiles-from-list-task/{profileList}', [ProfileListController::class, 'setGetProfilesFromListTask'])
        ->name('set-get-profiles-from-list-task');
    Route::get('/show-list-item-profiles/{profileList}', [ProfileListController::class, 'showListItemProfiles'])->name('show-list-item-profiles');
    Route::get('profile-list.show-followers/{profileInfo}', [ProfileListController::class, 'showProfileFollowers'])
        ->name('profile-list.show-followers');
    Route::get('go-through-profiles-in-browser/{profileList}/{profileInfo}', GoThroughProfilesInBrowserController::class)->name('go-through-profiles-in-browser');
    Route::get('go-through-profiles-in-browser/{profileList}', GoThroughProfilesInBrowserController::class)->name('go-through-profiles-in-browser');
    Route::get('go-through-search-profiles-in-browser/{searchResult}', GoThroughSearchProfilesInBrowserController::class)->name('go-through-search-profiles-in-browser');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
