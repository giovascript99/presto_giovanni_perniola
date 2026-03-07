<form wire:submit="store" class="tech-form-card p-4 p-md-5 position-relative rounded-4">
    <div class="card-corner-top"></div>

    @if (session()->has('success'))
        <div class="alert-success text-center mb-5">
            <i class="bi bi-check2-all me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <label class="tech-label-neon small mb-2">{{ __('ui.uploadImages') }}</label>
        <div class="input-group tech-input-group">
            <span class="input-group-text tech-input-icon"><i class="bi bi-upload"></i></span>
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control tech-input @error('temporary_images.*') is-invalid @enderror">
        </div>
        @error('temporary_images.*')
            <p class="tech-error-text">{{ $message }}</p>
        @enderror
    </div>

    @if (!empty($images))
        <div class="mb-4 p-3 tech-preview-box">
            <p class="tech-label-neon x-small mb-3 text-uppercase"">
                {{ __('ui.photoPreview') }}</p>
            <div class="row g-3">
                @foreach ($images as $key => $image)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 position-relative">
                        <div class="img-preview border-neon shadow-sm"
                            style="background-image: url({{ $image->temporaryUrl() }});">
                        </div>
                        <button type="button" class="btn-preview-delete"
                            wire:click="removeImages({{ $key }})">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="row g-3 mb-4">
        <div class="col-md-8">
            <label class="tech-label-neon small mb-2">{{ __('ui.title') }}</label>
            <div class="tech-input-group">
                <input type="text" class="form-control tech-input" wire:model.blur="title"
                    placeholder="ASSET_NAME_01">
            </div>
            @error('title')
                <p class="tech-error-text">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="tech-label-neon small mb-2">{{ __('ui.price') }}</label>
            <div class="tech-input-group">
                <input type="number" class="form-control tech-input" wire:model.blur="price"
                    placeholder="00.00">
            </div>
            @error('price')
                <p class="tech-error-text">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label class="tech-label-neon small mb-2">{{ __('ui.selectCategory') }}</label>
        <div class="tech-input-group">
            <select wire:model.blur="category_id" class="form-select tech-input">
                <option value="" class="bg-dark text-white-50">-- ACCESS_CATEGORY_DB --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="bg-dark text-white">{{ __('ui.' . $category->name) }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('category_id')
            <p class="tech-error-text">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="tech-label-neon small mb-2">{{ __('ui.description') }}</label>
        <div class="tech-input-group">
            <textarea rows="5" class="form-control tech-input" wire:model.blur="description"
                placeholder="IDENTIFY_DESCRIPTION..."></textarea>
        </div>
        @error('description')
            <p class="tech-error-text">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-3">
        <button type="submit" class="btn-cyber-large w-100 py-3">
            <span class="text-uppercase fw-bold" style="letter-spacing: 3px;">{{ __('ui.btnCreate') }}</span>
        </button>
    </div>

    <div class="card-corner-bottom"></div>
</form>
