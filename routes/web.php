<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginWithGoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// ==== home ====
Route::get('/',[GameController::class,'index']);


// ==== ajax ====
Route::get('/question', 'GameController@index');
Route::post('/answer', [GameController::class,'submitAnswer'])->name('answer.add');
Route::post('/submit-score', [GameController::class,'submitScore'])->name('score.add');

Route::middleware(['auth:sanctum', 'verified'])->get('/home',[GameController::class,'index'])->name('home');

// google authhentication
Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);
Route::get('logout', [LoginWithGoogleController::class, 'logout']);
