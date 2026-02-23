<form wire:submit.prevent="update" class="shadow p-4 rounded bg-body-tertiary">
    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" wire:model.blur="title" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <textarea wire:model.blur="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
        @error('description')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <input type="number" step="0.01" wire:model.blur="price"
            class="form-control @error('price') is-invalid @enderror">
        @error('price')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ __('ui.' . $category->name) }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex justify-content-center pt-3">
        <button type="submit" class="btn btn-warning">Salva Modifiche e Invia a Revisione</button>
    </div>
</form>
