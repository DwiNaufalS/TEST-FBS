@extends('adminGR.layouts')

@section('title', 'Antrian GR')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Tidak Ada Antrian</h2>
    <div class="mt-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text text-center">Saat ini tidak ada antrian untuk jenis antrian <strong>{{ $jenisAntrian }}</strong>.</p>
            </div>
            <div class="card-footer text-muted text-center">
                <a href="{{ route('adminGR.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection


