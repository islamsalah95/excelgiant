<div class="d-flex flex-column align-items-center justify-content-center min-vh-100">
    @if($contact)
        <!-- Contact Details Card -->
        <div class="card mb-4 shadow" style="width: 50%;">
            <div class="card-header bg-white text-white text-center">
                <h3>{{ __('contacts/show.contact_message') }}</h3>
            </div>
            <div class="card-body text-center">
                <h4 class="text-secondary">{{ auth()->user()->name }}</h4>
                <p class="text-secondary">{{ __('contacts/show.email') }}: {{ $contact->email }}</p>
                <p class="text-secondary">{{ __('contacts/show.phone') }}: {{ $contact->phone }}</p>
                <div class="mt-3">
                    <h5 class="mb-2">{{ __('contacts/show.message') }}:</h5>
                    <p class="fs-5 text-dark">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

        <!-- Redirect Form Card -->
        <div class="card shadow" style="width: 50%;">
            <div class="card-header bg-white text-white text-center">
                <h3>{{ __('contacts/show.redirect') }}</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="redirectMail">
                    <div class="mb-3">
                        <label for="redirectMessage" class="form-label">{{ __('contacts/show.redirect_message') }}</label>
                        <textarea id="redirectMessage" wire:model="message" class="form-control" rows="5" placeholder="{{ __('contacts/show.write_redirect') }}"></textarea>
                        @error('message')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="redirectEmail" class="form-label">{{ __('contacts/show.redirect_email') }}</label>
                        <input type="email" id="redirectEmail" wire:model="email" class="form-control" placeholder="{{ __('contacts/show.write_email') }}">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ __('contacts/show.send_redirect') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <!-- Error Message -->
        <div class="alert alert-danger text-center" role="alert">
            <h3>{{ __('contacts/show.contact_not_found') }}</h3>
        </div>
    @endif
</div>
