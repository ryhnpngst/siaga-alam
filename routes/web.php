<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home', ['title' => 'Beranda']);
});

Route::get('/articles', function () {
    return view('articles', ['title' => 'Artikel']);
});

Route::get('/report', function () {
    return view('report', ['title' => 'Laporan']);
});

Route::get('/educations', function () {
    return view('educations', ['title' => 'Edukasi']);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::resource('/register', RegisterController::class);

Route::resource('/admin', AdminController::class);
