                        <!-- Description (Arabic) -->
                        <div class="mb-3">
                            <label for="desc_ar" class="form-label">{{ __('services/edit.labels.desc_ar') }}</label>
                            <textarea id="desc_ar" class="form-control @error('desc_ar') is-invalid @enderror" dir="rtl" name="desc_ar">{{ $arCurentVal }}</textarea>
                            @error('desc_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (English) -->
                        <div class="mb-3">
                            <label for="desc_en" class="form-label">{{ __('services/edit.labels.desc_en') }}</label>
                            <textarea id="desc_en" class="form-control @error('desc_en') is-invalid @enderror" name="desc_en">{{ $enCurentVal }}</textarea>
                            @error('desc_en')
                                <div class="invalid-feedback">{{ $message }}</div>
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
                        @endpush
