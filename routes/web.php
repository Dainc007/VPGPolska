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

Route::post('/store', [App\Http\Controllers\TypeController::class, 'store'])->name('type.store');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'teams' => Game::all(),
        'request' => $_GET
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
