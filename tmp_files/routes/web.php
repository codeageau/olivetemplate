<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () { return redirect('/dashboard'); });

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/employees', 'modules.employees.index');
    Route::prefix('payroll')->group(function () {
        Route::view('/payslips', 'modules.payroll.payslips.index');
        Route::view('/security', 'modules.payroll.security.index');
        Route::view('/tax', 'modules.payroll.tax.index');
    });
    Route::view('/users', 'modules.users.index');
    Route::view('/settings', 'modules.settings.index');
});

