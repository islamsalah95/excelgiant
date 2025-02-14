<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    


    @if (session()->has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('message') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    

</div>
