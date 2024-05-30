<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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
    return view('login');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/mainscreen', function () {
    return view('mainscreen');
});

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
//Route::get('/users', [UserController::class, 'index'])->name('chart1');
