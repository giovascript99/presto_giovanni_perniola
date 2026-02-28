<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditArticleForm extends Component
{
    #[Validate('required')]
    #[Validate('min:5')]
    public $title;

    #[Validate('required')]
    #[Validate('min:10')]
    public $description;

    #[Validate('required')]
    #[Validate('numeric')]
    public $price;

    #[Validate('required')]
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

    // Metodo per messaggi di errore dinamici
    protected function messages()
    {
        return [
            'title.required' => __('ui.titleRequired'),
            'title.min' => __('ui.titleMin'),
            'description.required' => __('ui.descriptionRequired'),
            'description.min' => __('ui.descriptionMin'),
            'price.required' => __('ui.priceRequired'),
            'price.numeric' => __('ui.priceNumeric'),
            'category_id.required' => __('ui.categoryRequired'),
        ];
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

        session()->flash('message', __('ui.articleUpdated'));
        return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.edit-article-form');
    }
}
