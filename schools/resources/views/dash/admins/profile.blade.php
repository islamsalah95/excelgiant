@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('admins/profile.main_titel') }}/</span>{{ __('admins/profile.sub_titel') }}
@endsection

@section('content')
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <hr class="my-0" />
                <div class="card-body">
                    <form action="{{router('admins.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="needsclick">
                                            <div class="dz-message needsclick">
                                                 <div>
                                                    {{ __('admins/profile.upload_instruction') }}
                                                    <span class="note needsclick">{{ __('admins/profile.image_only_note') }}</span>
                                                 </div>
                                                 <div>
                                                    <img style="max-width: 300px; max-height:300px;" src="{{ $admin->getFirstMediaUrl('profile_image') }}" alt="{{ __('admins/profile.profile_image_alt') }}">
                                                 </div>
                                            </div>
                                            <div class="fallback">
                                                <input type="file" name="img" id="imageUpload" />
                                            </div>
                                            <div id="imagePreview" style="margin-top: 20px; text-align: center;">
                                            </div>
                                        </div>
                                        @error('img')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <!-- Form Fields -->
                            <div class="mb-3 col-md-6">
                                <label for="name_ar" class="form-label">{{ __('admins/profile.name_ar_label') }}</label>
                                <input class="form-control" type="text" name="name_ar" value="{{json_decode($admin->name, true)['ar']}}" id="name_ar" />
                                @error('name_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-3 col-md-6">
                                <label for="name_en" class="form-label">{{ __('admins/profile.name_en_label') }}</label>
                                <input class="form-control" type="text" value="{{json_decode($admin->name, true)['en']}}" name="name_en" id="name_en" />
                                @error('name_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">{{ __('admins/profile.password_label') }}</label>
                                <input class="form-control" type="password" name="password" id="password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12" style="display: flex; justify-content: center;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    {{ __('admins/edit.buttons.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     {{-- @livewire('admins.profile') --}}
    <!-- / Content -->
@endsection


@push('css')
<link rel="stylesheet" href="{{ asset_url('vendor/libs/dropzone/dropzone.css') }}"/>
@endpush

@push('js')
<script src="{{ asset_url('vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset_url('js/forms-file-upload.js') }}"></script>
@endpush