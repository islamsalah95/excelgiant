@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('settings/edit.main_titel') }}/</span>{{ __('settings/edit.sub_titel') }}
@endsection

@section('content')
    <!-- Content -->


    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>{{ __('roles/create.alerts.whoops') }}</strong>
                    {{ __('roles/create.alerts.input_problems') }}
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Social Media Section -->
                        <h4>{{ __('settings/edit.social_media') }}</h4>
                        @foreach ($settings['social_media'] as $platform => $url)
                            <div class="mb-3">
                                <label for="{{ $platform }}"
                                    class="form-label text-capitalize">{{ ucfirst($platform) }}</label>
                                <input type="url" name="social_media[{{ $platform }}]" id="{{ $platform }}"
                                    class="form-control @error('social_media.' . $platform) is-invalid @enderror"
                                    value="{{ $url }}">
                                @error('social_media.' . $platform)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        <!-- Branding Section -->
                        <h4>{{ __('settings/edit.branding') }}</h4>
                        @foreach ($settings['branding'] as $field => $value)
                            <div class="mb-3">
                                <label for="{{ $field }}"
                                    class="form-label text-capitalize">{{ ucfirst($field) }}</label>
                                @if ($field == 'logo' || $field == 'favicon')
                                    <input type="file" name="branding[{{ $field }}]" id="{{ $field }}"
                                        class="form-control @error('branding.' . $field) is-invalid @enderror">
                                    @if ($value)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/icons/' . $value) }}" alt="{{ ucfirst($field) }}"
                                                class="img-thumbnail" width="100">
                                        </div>
                                    @endif
                                @else
                                    <textarea name="branding[{{ $field }}]" id="{{ $field }}" rows="3"
                                        class="form-control @error('branding.' . $field) is-invalid @enderror">{{ $value }}</textarea>
                                @endif
                                @error('branding.' . $field)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        <!-- SEO Section -->
                        <h4>{{ __('settings/edit.seo') }}</h4>
                        @foreach ($settings['seo'] as $field => $value)
                            <div class="mb-3">
                                <label for="{{ $field }}"
                                    class="form-label text-capitalize">{{ ucfirst($field) }}</label>
                                <textarea name="seo[{{ $field }}]" id="{{ $field }}" rows="3"
                                    class="form-control @error('seo.' . $field) is-invalid @enderror">{{ $value }}</textarea>
                                @error('seo.' . $field)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        <!-- Contact Section -->
                        <h4>{{ __('settings/edit.contact') }}</h4>
                        @foreach ($settings['contact'] as $field => $value)
                            <div class="mb-3">
                                <label for="{{ $field }}"
                                    class="form-label text-capitalize">{{ ucfirst($field) }}</label>
                                <textarea name="contact[{{ $field }}]" id="{{ $field }}" rows="3"
                                    class="form-control @error('contact.' . $field) is-invalid @enderror">{{ $value }}</textarea>
                                @error('contact.' . $field)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">{{ __('settings/edit.save') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
