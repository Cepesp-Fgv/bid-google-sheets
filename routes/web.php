<?php

use App\Http\Controllers\GoogleSheetsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [GoogleSheetsController::class, 'open']);
Route::get('/pipe', [GoogleSheetsController::class, 'pipe'])->name('sheets.pipe');
Route::get('/open', [GoogleSheetsController::class, 'open'])->name('sheets.open');
Route::get('/callback', [GoogleSheetsController::class, 'callback'])->name('google.callback')->middleware('google.oauth2');
Route::view('/privacy-policy', 'privacy-policy');
Route::view('/terms-of-use', 'terms-of-use');
