<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h4 class="alert-heading"><i class="fas fa-check-circle"></i> Tiket Berhasil Diambil!</h4>
            <p>Anda telah berhasil mengambil tiket dengan nomor antrian:
                <strong>{{ $queue->nomor_antrian ?? 'N/A' }}</strong>.</p>
            <hr>
            <p class="mb-0">Silakan menunggu panggilan untuk antrian Anda.</p>
        </div>
        <div class="text-center mt-3">
            <a href="{{ url('/ticket') }}" class="btn btn-primary">Kembali ke Pengambilan Tiket</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
