<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::filter(request(['search', 'author']))->latest()->paginate(10)->withQueryString();

        return view('articles', ['title' => 'Artikel'], compact('articles'));
    }

    public function getArticleByUser(User $user)
    {
        $articles = $user->articles()->paginate(10)->withQueryString();

        return view('articles', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article', ['title' => 'Artikel'], compact('article'));
    }
}
