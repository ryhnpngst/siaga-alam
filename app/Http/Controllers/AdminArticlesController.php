<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminArticlesController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::filter(request(['search']))->latest()->paginate(10)->withQueryString();

        return view('admin.articles', ['title' => 'Articles'], compact('articles'));
    }

    public function __construct()
    {
        Paginator::defaultView('vendor.pagination.custom');
    }
}
