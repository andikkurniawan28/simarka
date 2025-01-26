<?php

use App\Http\Controllers\BagianController;
use App\Http\Controllers\SeksiController;
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

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::resource('/bagian', BagianController::class);
Route::resource('/seksi', SeksiController::class);
