<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Article;
use App\Models\Education;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $reportsCount = Report::count();
        $articlesCount = Article::count();
        $educationsCount = Education::count();

        return view('admin.index', ['title' => 'Admin Dashboard'], compact('usersCount', 'reportsCount', 'articlesCount', 'educationsCount'));
    }
}
