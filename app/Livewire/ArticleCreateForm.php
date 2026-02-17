<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleCreateForm extends Component
{
    use WithFileUploads;

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

    public $images = [];
    public $temporary_images;

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:2048',
            'temporary_images' => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImages($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id()
        ]);

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('success', 'Articolo creato correttamente');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.article-create-form');
    }
}
