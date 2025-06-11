<?php

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class)->names('dashboard');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::resource('/users', UsersController::class)->names('users');
});

Route::resource('/', OverviewController::class)->names('Overview');
Route::get('/charts', [OverviewController::class, 'charts'])->name('overview.charts');
Route::resource('/login', LoginController::class)->names('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

