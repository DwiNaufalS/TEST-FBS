<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Pendaftaran Customer</title>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h5>Pendaftaran Customer Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('queuing.storeNewCustomer') }}">
                @csrf
                <input type="hidden" name="no_polisi" value="{{ $noPolisi }}">
                <input type="hidden" name="jenis_antrian" value="{{ $jenis_antrian }}">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP:</label>
                    <input type="number" name="no_hp" id="no_hp" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Daftar dan Ambil Tiket</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
