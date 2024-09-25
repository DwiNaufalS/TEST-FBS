<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ambil Tiket Antrian</title>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card w-50">
        <div class="card-header text-center">
            <h5>Ambil Tiket Antrian</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('queuing.check') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="no_polisi" class="form-label">No Polisi:</label>
                    <input type="text" name="no_polisi" id="no_polisi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_antrian" class="form-label">Jenis Antrian:</label>
                    <select name="jenis_antrian" id="jenis_antrian" class="form-select" required>
                        <option value="">Pilih Jenis Antrian</option>
                        <option value="GR">GR</option>
                        <option value="BP">BP</option>
                    </select>
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Ambil Tiket</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
