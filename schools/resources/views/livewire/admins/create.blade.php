<div class="container mt-5">
    <div class="col-md mb-4 mb-md-0">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="submit" method="POST" class="browser-default-validation">
                    @csrf

                    <!-- Name (Arabic) -->
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">{{ __('admins/create.labels.name_ar') }}</label>
                        <input type="text" id="name_ar"
                            class="form-control @error('name_ar') is-invalid @enderror "dir="rtl" wire:model="name_ar"
                            placeholder="{{ __('admins/create.placeholders.name_ar') }}">
                        @error('name_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Name (English) -->
                    <div class="mb-3">
                        <label for="name_en" class="form-label">{{ __('admins/create.labels.name_en') }}</label>
                        <input type="text" id="name_en" class="form-control @error('name_en') is-invalid @enderror"
                            wire:model="name_en" placeholder="{{ __('admins/create.placeholders.name_en') }}">
                        @error('name_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('admins/create.labels.email') }}</label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                            wire:model="email" placeholder="{{ __('admins/create.placeholders.email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('admins/create.labels.role') }}</label>
                        <select id="role" class="form-control @error('role') is-invalid @enderror"
                            wire:model="role" placeholder="{{ __('admins/create.placeholders.role') }}">
                            <option value="" selected>{{ __('admins/create.placeholders.role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>                    

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12" style="display: flex; justify-content: center;">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-light">{{ __('admins/create.buttons.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
