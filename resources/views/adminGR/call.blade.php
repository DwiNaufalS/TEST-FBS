@extends('adminGR.layouts')

@section('title', 'Antrian GR')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <h2 class="text-center">Antrian Dipanggil</h2>
        <div class="mt-4">
            <div class="card">
                <div class="card-header">
                    Detail Antrian
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nomor Polisi: {{ $queue->no_polisi }}</h5>
                    <p class="card-text">Jenis Antrian: {{ $queue->jenis_antrian }}</p>
                    <p class="card-text">Waktu Pemanggilan: {{ $queue->waktu_pemanggilan->format('d-m-Y H:i:s') }}</p>
                    <p class="card-text">Status: {{ $queue->status }}</p>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <a href="{{ route('adminGR.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    <a href="{{ route('adminGR.callNextQueue', ['jenisAntrian' => $queue->jenis_antrian]) }}" class="btn btn-primary">Antrian Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

