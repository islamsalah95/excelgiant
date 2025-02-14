<div class="container mt-5">


    <div class="col-md mb-4 mb-md-0">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="submit" method="POST" class="browser-default-validation" wire:loading.attr="disabled">
                    @csrf

                    <div class="row">
                    <!-- img -->

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
                                                <img style="max-width: 300px; max-height:300px;" src="" alt="{{ __('admins/profile.profile_image_alt') }}">
                                             </div>
                                        </div>
                                        <div class="fallback">
                                            <input type="file" wire:model="img" id="imageUpload" />
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

                    <!-- Name (Arabic) -->
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">{{ __('services/edit.labels.name_ar') }}</label>
                        <input 
                            type="text" 
                            id="name_ar" 
                            class="form-control @error('name_ar') is-invalid @enderror "dir="rtl" 
                            wire:model="name_ar" 
                            placeholder="{{ __('services/edit.placeholders.name_ar') }}"
                        >
                        @error('name_ar') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <!-- Name (English) -->
                    <div class="mb-3">
                        <label for="name_en" class="form-label">{{ __('services/edit.labels.name_en') }}</label>
                        <input 
                            type="text" 
                            id="name_en" 
                            class="form-control @error('name_en') is-invalid @enderror" 
                            wire:model="name_en" 
                            placeholder="{{ __('services/edit.placeholders.name_en') }}"
                        >
                        @error('name_en') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <!-- Slug (Arabic) -->
                    <div class="mb-3">
                        <label for="slug_ar" class="form-label">{{ __('services/edit.labels.slug_ar') }}</label>
                        <input 
                            type="text" 
                            id="slug_ar" 
                            class="form-control @error('slug_ar') is-invalid @enderror "dir="rtl" 
                            wire:model="slug_ar" 
                            placeholder="{{ __('services/edit.placeholders.slug_ar') }}"
                        >
                        @error('slug_ar') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <!-- Slug (English) -->
                    <div class="mb-3">
                        <label for="slug_en" class="form-label">{{ __('services/edit.labels.slug_en') }}</label>
                        <input 
                            type="text" 
                            id="slug_en" 
                            class="form-control @error('slug_en') is-invalid @enderror" 
                            wire:model="slug_en" 
                            placeholder="{{ __('services/edit.placeholders.slug_en') }}"
                        >
                        @error('slug_en') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                     <!-- Description (Arabic) -->
                     <div class="mb-12"> <label for="desc_ar"
                        class="form-label">{{ __('sub_services/create.labels.desc_ar') }}</label>
                    <textarea id="desc_ar" class="form-control @error('desc_ar') is-invalid @enderror editor-height"
                        placeholder="{{ __('sub_services/create.placeholders.desc_ar') }}" style="min-height: 300px;" dir="rtl">{{ $desc_ar }}</textarea> @error('desc_ar')
                        <div class="invalid-feedback" style="min-height: 500px;">{{ $message }}</div>
                    @enderror
                </div>
                 <!-- Description (English) -->
                <div class="mb-12"> <label for="desc_en"
                        class="form-label">{{ __('sub_services/create.labels.desc_en') }}</label>
                    <textarea id="desc_en" class="form-control @error('desc_en') is-invalid @enderror editor-height"
                        placeholder="{{ __('sub_services/create.placeholders.desc_en') }}" style="min-height: 300px;">{{ $desc_ar }}</textarea> @error('desc_en')
                        <div class="invalid-feedback" style="min-height: 500px;">{{ $message }}</div>
                    @enderror
                </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('services/edit.buttons.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@script
<script>
let editorInstance;
let editorInstance_en;
ClassicEditor.create(document.querySelector('#desc_ar'), {
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
ClassicEditor.create(document.querySelector('#desc_en'), {
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

$wire.on('post-submit', () => {
    if (editorInstance) {
        const editorContent = editorInstance.getData();
        const editorContent_en = editorInstance_en.getData();

        console.log(editorContent);
        console.log(editorContent_en);

        $wire.dispatch('post-created', {
            desc_ar: editorContent,
            desc_en: editorContent_en
        });
    } else {
        console.error('Editor instance not found');
    }
});
</script>
@endscript



@push('css')
<link rel="stylesheet" href="{{ asset_url('vendor/libs/dropzone/dropzone.css') }}"/>
@endpush

@push('js')
<script src="{{ asset_url('vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset_url('js/forms-file-upload.js') }}"></script>
@endpush