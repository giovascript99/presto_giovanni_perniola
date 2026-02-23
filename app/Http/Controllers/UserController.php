<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function dashboard()
    {
        // Recuperiamo l'utente autenticato come istanza del nostro Modello User
        $user = Auth::user();

        // Ora chiamiamo la relazione. 
        // Se non funziona con Auth::user(), forziamo il recupero dal modello:
        $articles = User::find(Auth::id())->articles()->orderBy('created_at', 'desc')->get();

        return view('user.dashboard', compact('articles'));
    }
}
