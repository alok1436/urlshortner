<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShorterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UrlShorterController::class, 'index'])->name('home');
Route::post('generate/link', [UrlShorterController::class, 'store'])->name('generate.link');
Route::get('{code}', [UrlShorterController::class, 'shortLink'])->name('short.link');