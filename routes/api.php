<?php

use App\Http\Controllers\Api\Walker\TasksController;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProfileCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/profiles', static function () {
    return new ProfileCollection(Profile::with('proxy')->get());
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('walker-tasks', [TasksController::class, 'walkerTasks'])->name('walker-tasks');
});

Route::post('/tokens/create', static function () {
    $user = App\Models\User::find(1);
    $token = $user->createToken('Token');
    return ['token' => $token->plainTextToken];
});
