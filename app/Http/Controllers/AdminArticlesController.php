<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminArticlesController extends Controller
{
    public function index()
    {
        return view('admin.articles', ['title' => 'Articles']);
    }
}
