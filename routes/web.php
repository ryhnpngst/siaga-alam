<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ReportController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);


Route::resource('/report', ReportController::class);

Route::get('/educations', [EducationController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/register', RegisterController::class);

Route::resource('/admin', AdminController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
