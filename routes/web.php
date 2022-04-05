<?php

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
    return redirect()->route('buildings');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/buildings', function () {
    return view('buildings');
})->name('buildings');

Route::get('/buildings-create', function () {
    return view('building-create');
})->name('building-create');

Route::get('/building/{id}', function () {
    return view('edit-building');
})->name('building-edit');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
