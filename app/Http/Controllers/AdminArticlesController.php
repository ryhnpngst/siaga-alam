<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function show(Article $article)
    {
        return view('admin.articles-show', ['title' => 'Detail Artikel'], compact('article'));
    }

    public function create()
    {
        return view('admin.articles-create', ['title' => 'Buat Artikel']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // jika image kosong, maka skip, jika ada simpan
        if (!$request->file('thumbnail')) {
            Article::create([
                'title' => $request->title,
                'author_id' => Auth::user()->id,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
            ]);

            return redirect('/admin/articles')->with('addArticleSuccess', 'Artikel berhasil ditambahkan');
        }

        $image = $request->file('thumbnail');
        $image->storeAs('public/images', $image->hashName());

        Article::create([
            'thumbnail' => $image->hashName(),
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
        ]);

        return redirect('/admin/articles')->with('addArticleSuccess', 'Artikel berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        return view('admin.articles-edit', ['title' => 'Edit Artikel'], compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->file('thumbnail')) {
            Storage::delete('public/images/' . $article->thumbnail);

            $image = $request->file('thumbnail');
            $image->storeAs('public/images', $image->hashName());

            $article->update([
                'thumbnail' => $image->hashName(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
            ]);
        } else {
            $article->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
            ]);
        }

        return redirect('/admin/articles')->with('editArticleSuccess', 'Artikel berhasil diubah');
    }


    public function destroy(Article $article)
    {
        Storage::delete('public/images/' . $article->thumbnail);

        $article->delete();

        return redirect('/admin/articles')->with('deleteArticleSuccess', 'Artikel berhasil dihapus');
    }
}
