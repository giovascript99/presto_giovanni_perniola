<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditArticleForm extends Component
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
    public $category_id;
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->category_id = $article->category_id;
    }

    public function update()
    {
        $this->validate();

        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'is_accepted' => null, // Torna in revisione!
        ]);

        session()->flash('message', 'Articolo aggiornato con successo. È di nuovo in fase di revisione.');
        return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.edit-article-form');
    }
}
