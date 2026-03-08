@if (session('message'))
    <div class="alert-cyber mt-4">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <i class="bi bi-exclamation-triangle-fill me-2 text-neon"></i>
                <span class="text-white fw-bold">{{ session('message') }}</span>
            </div>
        </div>
    </div>
@endif
