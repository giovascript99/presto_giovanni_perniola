<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    // Stiamo passando gli articoli della nostra piattaforma ordinati in ordine decrescente di creazione alla vista article.index
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(9);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function destroy(Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            return redirect()->back()->with('error', __('ui.unauthorized'));
        }

        // 1. Definiamo il percorso della cartella dell'articolo
        $directory = "articles/{$article->id}";

        // 2. Cancellazione Immagini Fisiche
        // Elimina il file dalla cartella storage/app/public/articles/...
        if (Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->deleteDirectory($directory);
        }

        // 3. Cancelliamo i record dal database
        $article->delete();

        return redirect()->route('user.dashboard')->with('message', __('ui.articleDeleted'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles->where('is_accepted', true);
        return view('article.byCategory', compact('articles', 'category'));
    }
}
