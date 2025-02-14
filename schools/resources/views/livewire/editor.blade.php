<div>

    <!-- Create editor container -->
    <textarea id="editor"></textarea>


</div>

<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            // Set initial value if any
            editor.setData(@this.value);

            // Listen for changes in the editor
            editor.model.document.on('change:data', () => {
                // Emit the updated value to Livewire
                @this.set('value', editor.getData());
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
