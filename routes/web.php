<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\SewaController;
use App\Models\Mobil;
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
    return view('welcome');
});

Auth::routes();

Route::get('/index', function () {
    $mobils = Mobil::all();
    return view('index', compact('mobils'));
})->name('index');
Route::get('/index/search', [MobilController::class, 'search'])->name('search');

Route::get('/create', [MobilController::class, 'create'])->name('create');
Route::post('/index', [MobilController::class, 'store'])->name('mobils.store');

Route::get('/sewa/create', [SewaController::class, 'create'])->name('sewa.create');
Route::post('/sewa', [SewaController::class, 'store'])->name('sewa.store');

Route::post('/return/{sewa}', [SewaController::class, 'returnMobil'])->name('return');

Route::resource('mobils', MobilController::class);
