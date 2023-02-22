<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('artists', [ArtistController::class,'index']);
Route::post('artists', [ArtistController::class,'store']);
Route::put('artists/{artist}', [ArtistController::class,'update']);
Route::get('artists/{artist}', [ArtistController::class,'show']);
Route::delete('artists/{artist}', [ArtistController::class,'destroy']);

Route::apiResource('album',AlbumController::class);