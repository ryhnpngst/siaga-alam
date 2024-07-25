<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\AdminArticlesController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminEducationsController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);
Route::get('/authors/{user:username}', [ArticleController::class, 'getArticleByUser']);


Route::get('/educations', [EducationController::class, 'index']);
Route::get('/educations/{education:slug}', [EducationController::class, 'show']);
Route::get('/educations/authors/{user:username}', [EducationController::class, 'getEducationByUser']);

Route::middleware('guest')->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::resource('/register', RegisterController::class);
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth', 'admin')->group(function () {
  Route::get('/admin', [AdminDashboardController::class, 'index']);

  Route::resource('/admin/reports', AdminReportsController::class);

  Route::resource('/admin/users', AdminUsersController::class);

  Route::resource('/admin/articles', AdminArticlesController::class);

  Route::resource('/admin/educations', AdminEducationsController::class);
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);

  Route::resource('/report', ReportController::class);
});
