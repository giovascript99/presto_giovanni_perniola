<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        // Stiamo passando una variabile $articles contenente gli ultimi 6 articoli caricati in piattaforma alla vista della homepage
        $articles = Article::take(6)->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('articles'));
    }
}
