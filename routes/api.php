<?php

use App\Http\Controllers\ArtistsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Artist;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/profile',[UserController::class,'profile']);
    Route::post('/refresh',[UserController::class,'refresh']);
    Route::post('/resetPassword',[UserController::class,'resetPassword']);
    Route::post('/logout',[UserController::class,'logout']);
});

Route::group(['middleware' => ['jwt.admin.verify']], function() {
    Route::apiResource('artist',ArtistsApiController::class);
});

