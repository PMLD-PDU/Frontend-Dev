<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
//Route::get('/users', [UserController::class, 'index'])->name('chart1');

// login
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

// mainscreen
Route::get('/mainscreen', [LoginController::class, 'mainscreen']);
Route::get('/mainscreen/place', [LoginController::class, 'place']) -> name('getPlace');
Route::get('/mainscreen/well', [LoginController::class, 'well']) -> name('getWell');

// //dashboard
// Route::get('/mainscreen/well', [LoginController::class, 'well']) -> name('getWell');