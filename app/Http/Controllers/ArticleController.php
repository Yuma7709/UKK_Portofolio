<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q        = trim((string) $request->query('q', ''));
        $kategori = $request->query('kategori');

        $articles = Article::published()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('judul', 'like', "%{$q}%")
                      ->orWhere('ringkasan', 'like', "%{$q}%")
                      ->orWhere('tags', 'like', "%{$q}%");
                });
            })
            ->when($kategori, fn ($query) => $query->where('kategori', $kategori))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('blog.index', [
            'articles'     => $articles,
            'kategoriList' => Article::KATEGORI,
            'q'            => $q,
            'kategori'     => $kategori,
        ]);
    }

    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)
            ->when(! session('admin_login'), fn ($query) => $query->published())
            ->firstOrFail();

        $related = Article::published()
            ->where('id', '!=', $article->id)
            ->where('kategori', $article->kategori)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.show', compact('article', 'related'));
    }
}