<?php

use Illuminate\Support\Facades\Route;

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
