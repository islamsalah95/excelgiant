@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('languages/edit.main_titel') }}/</span>{{ __('languages/edit.sub_titel') }}
@endsection

@section('content')
    <div class="container">
        <h1 style="direction:{{ getDirection() }};">{{ __('languages/edit.Language_Translations_Page') }}
            ({{ $slug }})</h1>
        <form
            action="{{ route('languages.update', ['locale' => $language, 'key' => $key, 'language' => $language, 'slug' => $slug]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="value">{{ __('languages/edit.Translation_for') }}:
                    <strong>{{ $key }}</strong></label>
                <textarea name="value" id="value" class="form-control" rows="5"
                    @if ($language == 'ar') style="direction: {{ getDirection() }}; text-align: {{ getDirection() == 'rtl' ? 'left' : 'right' }};" @endif
                    required>{{ $value }}
            </textarea>
            </div>

            <button type="submit" class="btn btn-success">{{ __('languages/edit.Save') }}</button>
            <a href="{{ router('languages.index', ['key' => $key, 'language' => 'en']) }}"
                class="btn btn-secondary">{{ __('languages/edit.Cancel') }}</a>
        </form>
    </div>
@endsection


@if ($key == 'privacy.content'  || $key == 'terms.content')
    @push('js_header')
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    @endpush
    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let editorElement = document.querySelector('#value');
                if (editorElement) {
                    ClassicEditor
                        .create(editorElement, {
                            language: '{{ $language == 'ar' ? 'ar' : 'en' }}', // Set CKEditor language
                            toolbar: [
                                'bold', 'italic', 'link', '|',
                                'heading', '|', 'alignment', '|',
                                'bulletedList', 'numberedList', '|',
                                'blockQuote', 'undo', 'redo'
                            ]
                        })
                        .then(editor => {
                            // Apply correct text direction
                            editor.editing.view.document.getRoot().setAttribute('dir', '{{ getDirection() }}');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        </script>
    @endpush
@endif
