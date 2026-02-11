<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

// Area revisore
Route::get('revisor/index', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');
// Con in metodo patch creo una rotta che accetta un parametro, article
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
// Questa rotta invece rifiuta un parametro, article
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
// Mail
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// Rotta per effettuare la ricerca degli articoli
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
