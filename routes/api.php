<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('artists', [ArtistController::class,'index']);
Route::post('artists', [ArtistController::class,'store']);
Route::put('artists/{artist}', [ArtistController::class,'update']);
Route::get('artists/{artist}', [ArtistController::class,'show']);
Route::delete('artists/{artist}', [ArtistController::class,'destroy']);


// Route::apiResource('artists',ArtistController::class);