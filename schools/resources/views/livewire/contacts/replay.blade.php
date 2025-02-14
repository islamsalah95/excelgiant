<div class="d-flex flex-column align-items-center justify-content-center min-vh-100">
    @if($contact)
        <!-- Contact Details Card -->
        <div class="card mb-4 shadow" style="width: 50%;">
            <div class="card-header bg-white text-white text-center">
                <h3>{{ __('contacts/show.contact_message') }}</h3>
            </div>
            <div class="card-body text-center">
                <h4 class="text-primary">{{ __('contacts/show.name') }}: {{ $contact->name }}</h4>
                <p class="text-secondary">{{ __('contacts/show.email') }}: {{ $contact->email }}</p>
                <p class="text-secondary">{{ __('contacts/show.phone') }}: {{ $contact->phone }}</p>
                <div class="mt-3">
                    <h5 class="mb-2">{{ __('contacts/show.message') }}:</h5>
                    <p class="fs-5 text-dark">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

        <!-- Reply Form Card -->
        <div class="card shadow" style="width: 50%;">
            <div class="card-header bg-white text-white text-center">
                <h3>{{ __('contacts/show.reply') }}</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="sendReply">
                    <div class="mb-3">
                        <label for="replyMessage" class="form-label">{{ __('contacts/show.your_reply') }}</label>
                        <textarea id="replyMessage" wire:model="message" class="form-control" rows="5" placeholder="{{ __('contacts/show.write_reply') }}"></textarea>
                        @error('message')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ __('contacts/show.send_reply') }}
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
