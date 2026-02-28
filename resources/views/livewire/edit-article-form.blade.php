<form wire:submit.prevent="update" class="tech-form-card p-4 p-md-5 position-relative shadow-lg">
    <div class="card-corner-top"></div>

    @if (session()->has('message'))
        <div class="alert-success text-center mb-5">
            <i class="bi bi-shield-check me-2"></i> {{ session('message') }}
        </div>
    @endif

    <div class="row g-3 mb-4">
        <div class="col-md-8">
            <label class="tech-label-neon small mb-2 text-uppercase">{{ __('ui.title') }}</label>
            <div class="tech-input-group">
                <input type="text" class="form-control tech-input @error('title') is-invalid @enderror"
                    wire:model.blur="title" placeholder="IDENTIFY_ASSET_NAME">
            </div>
            @error('title')
                <p class="tech-error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="tech-label-neon small mb-2 text-uppercase">{{ __('ui.price') }}</label>
            <div class="tech-input-group">
                <input type="number" step="0.01"
                    class="form-control tech-input text-success @error('price') is-invalid @enderror"
                    wire:model.blur="price" placeholder="00.00">
            </div>
            @error('price')
                <p class="tech-error-text">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label class="tech-label-neon small mb-2 text-uppercase">{{ __('ui.category') }}</label>
        <div class="tech-input-group">
            <select wire:model="category_id" class="form-select tech-input @error('category_id') is-invalid @enderror">
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

    {{-- Descrizione --}}
    <div class="mb-4">
        <label class="tech-label-neon small mb-2 text-uppercase">{{ __('ui.description') }}</label>
        <div class="tech-input-group">
            <textarea rows="5" class="form-control tech-input @error('description') is-invalid @enderror"
                wire:model.blur="description" placeholder="REWRITE_DESCRIPTION_DATA..."></textarea>
        </div>
        @error('description')
            <p class="tech-error-text">{{ $message }}</p>
        @enderror
    </div>

    {{-- Bottone di Invio --}}
    <div class="pt-3">
        <button type="submit" class="btn-cyber-large w-100 py-3">
            <span class="btn-text text-uppercase fw-bold" style="letter-spacing: 3px;">
                <i class="bi bi-cloud-arrow-up me-2"></i> {{ __('ui.saveAndSend') }}
            </span>
        </button>
    </div>

    <div class="card-corner-bottom"></div>
</form>
