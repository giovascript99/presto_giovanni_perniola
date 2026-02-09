<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    // Stiamo passando gli articoli della nostra piattaforma ordinati in ordine decrescente di creazione alla vista article.index
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        return view('article.byCategory', ['articles' => $category->articles, 'category' => $category]);
    }
}
