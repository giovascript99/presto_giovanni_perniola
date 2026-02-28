<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
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

    public $images = [];

    public $temporary_images;

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
            'temporary_images.*.image' => __('ui.errorImage'),
            'temporary_images.*.max' => __('ui.errorMax2mb'),
            'temporary_images.max' => __('ui.errorMax6Images'),
        ];
    }

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
                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch(new GoogleVisionSafeSearch($newImage->id));
                // dispatch(new GoogleVisionLabelImage($newImage->id));
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 600, 600),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('success', __('ui.articleCreated'));
        $this->reset();
    }

    public function render()
    {
        return view('livewire.article-create-form');
    }
}
