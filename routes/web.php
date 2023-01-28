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
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\Controller::class, 'login']);
Route::post('/login', [App\Http\Controllers\Controller::class, 'doLogin']);
Route::get('/dashboard', [App\Http\Controllers\Controller::class, 'listUser']);
Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout']);