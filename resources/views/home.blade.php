<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert.css') }}">
</head>
<body>
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center">Selamat Datang di Aplikasi Antrian</h1>
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary">Masuk sebagai Admin</a>
            <a href="{{ route('queuing.ticketForm') }}" class="btn btn-success">Ambil Tiket</a>
           </div>
        
        @include('sweetalert::alert')
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>
</body>
</html>
