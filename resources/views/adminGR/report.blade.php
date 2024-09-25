@extends('adminGR.layouts')

@section('title', 'Laporan Pemanggilan Antrian GR')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Laporan Pemanggilan Antrian GR</h2>
    <div class="mt-4">
        <a href="{{ route('adminGR.exportExcel') }}" class="btn btn-success mt-3">Ekspor ke Excel</a>
        <a href="{{ route('adminGR.exportPDF') }}" class="btn btn-danger mt-3">Ekspor ke PDF</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Polisi</th>
                    <th>Jenis Antrian</th>
                    <th>Waktu Pemanggilan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($queues as $index => $queue)
                    <tr>
                        <td>{{ $index + 1 + ($queues->currentPage() - 1) * $queues->perPage() }}</td>
                        <td>{{ $queue->no_polisi }}</td>
                        <td>{{ $queue->jenis_antrian }}</td>
                        <td>
                            @if ($queue->waktu_pemanggilan)
                                {{ \Carbon\Carbon::parse($queue->waktu_pemanggilan)->format('d-m-Y H:i:s') }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $queue->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <a href="{{ route('adminGR.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
            <div>
                @if ($queues->onFirstPage())
                    <a href="{{ $queues->nextPageUrl() }}" class="btn btn-primary mt-3">Next</a>
                @elseif ($queues->hasMorePages())
                    <a href="{{ $queues->previousPageUrl() }}" class="btn btn-secondary mt-3">Previous</a>
                    <a href="{{ $queues->nextPageUrl() }}" class="btn btn-primary mt-3">Next</a>
                @else
                    <a href="{{ $queues->previousPageUrl() }}" class="btn btn-secondary mt-3">Previous</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
