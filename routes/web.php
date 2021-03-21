<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaderController;
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



// Route::view('login', 'login');
Route::post('login', [Readercontroller::class, 'check'])->name('auth.check');

// Route::get('/','App\Http\Controllers\ReaderController@index')->middleware('authCheck');
Route::get('logout','App\Http\Controllers\ReaderController@logout');
Route::resource('readers', ReaderController::class);

Route::get('login', [Readercontroller::class, 'logView']);
Route::get('/', [Readercontroller::class, 'index']);
// Route::get('readers', [Readercontroller::class, 'index'])->middleware('authCheck');
