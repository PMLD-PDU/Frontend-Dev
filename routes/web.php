<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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

Route::get('/mainscreen', function () {
    return view('mainscreen');
})->name('mainscreen');

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

// Login route
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route to fetch company data
Route::get('/company-data', [CompanyController::class, 'getCompanyData'])->name('company-data');