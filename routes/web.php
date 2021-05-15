<?php

use App\Http\Controllers\TypeController;
use App\Models\Game;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/request', function () {
    return $_REQUEST;
})->name('request');

Route::get('/dashboard', [App\Http\Controllers\TypeController::class, 'index'])->name('dashboard');

Route::post('/store', [App\Http\Controllers\TypeController::class, 'store'])->name('type.store');

Route::get('/matchday/add', [App\Http\Controllers\GameController::class, 'add'])->name('matchday.add');
Route::post('/matchday/store', [App\Http\Controllers\GameController::class, 'store'])->name('matchday.store');
Route::post('/matchday/update', [App\Http\Controllers\GameController::class, 'update'])->name('matchday.update');

require __DIR__ . '/auth.php';
