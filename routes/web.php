<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::get('forgot', [AuthController::class, 'forgot']);
Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

