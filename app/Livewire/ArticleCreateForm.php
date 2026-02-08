<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ArticleCreateForm extends Component
{
    #[Validate('required', message: 'Il titolo è obbligatorio.')]
    #[Validate('min:5', message: 'Il titolo è troppo corto.')]
    public $title;
    #[Validate('required', message: 'La descrizione è obbligatoria.')]
    #[Validate('min:10', message: 'La descrizione è troppo corta.')]
    public $description;
    #[Validate('required', message: 'Il prezzo è obbligatorio.')]
    #[Validate('numeric', message: 'Il prezzo deve essere un numero.')]
    public $price;
    #[Validate('required', message: 'La categoria è obbligatoria.')]
    public $category;
    public $article;

    public function store()
    {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'user_id' => Auth::id()
        ]);

        $this->reset();

        session()->flash('success', 'Articolo creato correttamente');
    }

    public function render()
    {
        return view('livewire.article-create-form');
    }
}
