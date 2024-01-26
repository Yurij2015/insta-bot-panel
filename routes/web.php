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
use App\Http\Controllers\SettingsController;
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
    Route::get('/personal-profile-info/{profile}', [ProfileController::class, 'personalProfileInfo'])->name('personal-profile-info');
    Route::get('/inst-profile-info', [InstProfileInfoController::class, 'index'])->name('inst-profile-info');
    Route::controller(InstSearchController::class)->group(function () {
        Route::get('/inst-search', 'index')->name('inst-search');
        Route::post('/handle-search', 'handleSearch')->name('handle-search');
    });
    Route::controller(InstSearchResultController::class)->group(function () {
        Route::get('/inst-search-result', 'index')->name('inst-search-result');
        Route::get('/ig-hashags/{searchResult}', 'igHashtags')->name('ig-hashtags');
        Route::get('/ig-places/{searchResult}', 'igPlaces')->name('ig-places');
        Route::get('/ig-users/{searchResult}', 'igUsers')->name('ig-users');
        Route::delete('/inst-search-result/delete/{searchResult}', 'deleteSearchResult')->name('inst-search-result.delete');
        Route::delete('/ig-user/delete/{igUser}', 'igUserDelete')->name('ig-user.delete');
        Route::get('/proxy-image/{url}', 'proxyImage')->name('proxy-image')->where('url', '.*');
        Route::post('/ig-users.set-get-full-data-task/{searchResult}', 'setGetFullDataTask')->name('ig-users.set-get-full-data-task');
    });
    Route::controller(InstProfileFollowersController::class)->group(function () {
        Route::post('/ig-user.set-get-followers-task-for-search/{igUser}', 'setGetFollowersTaskForSearch')->name('ig-user.set-get-followers-task-for-search');
        Route::post('/set-get-followers-task-for-list/{profileList}/{profileInfo}', 'setGetFollowersTaskForProfileOfList')->name('set-get-followers-task-for-list');
        Route::post('/set-get-profiles-of-list-data/{profileList}/{profileInfo}', 'setGetProfilesOfListData')->name('set-get-profiles-of-list-data');
        Route::get('ig-users.show-followers/{igUser}', 'showFollowers')->name('ig-users.show-followers');
    });
    Route::get('get-followers-tasks', [GetFollowersTaskController::class, 'index'])->name('get-followers-tasks');
    Route::get('get-full-ig-users-data-tasks', [GetFullIgUsersDataTaskController::class, 'index'])->name('get-full-ig-users-data-tasks');
    Route::get('/open-in-browser/{profile}', OpenInBrowserController::class)->name('open-in-browser');
    Route::controller(ProfileListController::class)->group(function () {
        Route::get('profile-lists', 'index')->name('profile-lists');
        Route::get('add-profiles-list', 'addProfileList')->name('add-profiles-list');
        Route::post('store-profiles-list', 'storeProfilesList')->name('store-profiles-list');
        Route::get('edit-profiles-list/{profileList}', 'editProfileList')->name('edit-profiles-list');
        Route::post('update-profiles-list/{profileList}', 'updateProfilesList')->name('update-profiles-list');
        Route::post('set-get-profiles-from-list-task/{profileList}', 'setGetProfilesFromListTask')->name('set-get-profiles-from-list-task');
        Route::get('show-list-item-profiles/{profileList}', 'showListItemProfiles')->name('show-list-item-profiles');
        Route::get('profile-list.show-followers/{profileInfo}', 'showProfileFollowers')->name('profile-list.show-followers');
        Route::delete('profile-lists/delete/{profileList}', 'deleteProfileList')->name('profile-lists.delete');
    });
    Route::get('get-profiles-data-from-list', [GetProfilesDataFromListController::class, 'index'])->name('get-followers-tasks');
    Route::get('go-through-profiles-in-browser/{profileList}/{profileInfo}', GoThroughProfilesInBrowserController::class)->name('go-through-profiles-in-browser');
    Route::get('go-through-profiles-in-browser/{profileList}', GoThroughProfilesInBrowserController::class)->name('go-through-profiles-in-browser');
    Route::get('go-through-search-profiles-in-browser/{searchResult}', GoThroughSearchProfilesInBrowserController::class)->name('go-through-search-profiles-in-browser');
    Route::controller(SettingsController::class)->group(function () {
        Route::get('settings-index', 'index')->name('settings-index');
        Route::get('settings-create', 'create')->name('settings-create');
        Route::post('settings-save', 'store')->name('settings-save');
        Route::get('settings-item-edit/{settinsItem}', 'edit')->name('settings-item-edit');
        Route::put('settings-item-update/{settingsItem}', 'update')->name('settings-item-update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
