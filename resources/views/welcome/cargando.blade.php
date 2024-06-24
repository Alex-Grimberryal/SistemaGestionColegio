<x-head></x-head>
<div class="container">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1>Cargando</h1>
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-info" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>

@if (session('redirectToWelcome'))
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('welcome') }}";
        }, 1000);
    </script>
@endif
