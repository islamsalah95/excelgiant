<!-- Description (Arabic) -->
<div class="mb-12">
    <label for="{{$ar}}" class="form-label">{{ __('sub_services/create.labels.' . $ar) }}</label>
    <textarea id="{{$ar}}" name="{{$ar}}" class="form-control @error($ar) is-invalid @enderror editor-height"
        placeholder="{{ __('sub_services/create.placeholders.' . $ar) }}"  style="min-height: 300px;" dir="rtl">{{ old($ar) }}</textarea>
    @error($ar)
        <div class="invalid-feedback" style="min-height: 500px;">{{ $message }}</div>
    @enderror
</div>

<!-- Description (English) -->
<div class="mb-12">
    <label for="{{$en}}" class="form-label">{{ __('sub_services/create.labels.' . $en) }}</label>
    <textarea id="{{$en}}" name="{{$en}}" class="form-control @error($en) is-invalid @enderror editor-height"
        placeholder="{{ __('sub_services/create.placeholders.' . $en) }}" style="min-height: 300px;">{{ old($en) }}</textarea>
    @error($en)
        <div class="invalid-feedback" style="min-height: 500px;">{{ $message }}</div>
    @enderror
</div>



@push('css')
    <link rel="stylesheet" href="{{ asset_url('vendor/libs/dropzone/dropzone.css') }}" />
@endpush

@push('js')
    <script src="{{ asset_url('vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset_url('js/forms-file-upload.js') }}"></script>
    <script>
        let editorInstance;
        let editorInstance_en;
        
        // Initialize the Arabic Editor
        ClassicEditor.create(document.querySelector('#{{ $ar }}'), {
            language: 'ar', // Sets the editor language to Arabic
            toolbar: [
                'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                'blockQuote', 'insertTable', 'imageUpload', 'htmlEmbed', 'mediaEmbed', 'undo', 'redo'
            ],
            ckfinder: {
                uploadUrl: '/upload-image'
            },
            image: {
                toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|',
                    'resizeImage'
                ]
            },
            htmlEmbed: {
                showPreviews: true
            },
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            editorInstance = editor; // Save the editor instance for later use
        })
        .catch(error => {
            console.error(error);
        });
    
        // Initialize the English Editor
        ClassicEditor.create(document.querySelector('#{{ $en }}'), {
            toolbar: [
                'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                'blockQuote', 'insertTable', 'imageUpload', 'htmlEmbed', 'mediaEmbed', 'undo', 'redo'
            ],
            ckfinder: {
                uploadUrl: '/upload-image'
            },
            image: {
                toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|',
                    'resizeImage'
                ]
            },
            htmlEmbed: {
                showPreviews: true
            },
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            editorInstance_en = editor; // Save the editor instance for later use
        })
        .catch(error => {
            console.error(error);
        });
    
        // Handling the post-submit event for Livewire
        $wire.on('post-submit', () => {
            if (editorInstance && editorInstance_en) {
                const editorContent = editorInstance.getData();
                const editorContent_en = editorInstance_en.getData();
    
                console.log(editorContent);
                console.log(editorContent_en);
    
                $wire.dispatch('post-created', {
                    '{{ $ar }}': editorContent,
                    '{{ $en }}': editorContent_en
                });
            } else {
                console.error('Editor instance not found');
            }
        });
    </script>
    
@endpush
