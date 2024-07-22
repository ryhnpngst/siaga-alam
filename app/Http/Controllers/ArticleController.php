<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles', ['title' => 'Artikel'], compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article', ['title' => 'Artikel'], compact('article'));
    }
}
