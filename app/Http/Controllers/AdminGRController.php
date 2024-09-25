<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataQueuing;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QueuesGRExport; // Pastikan nama kelas ekspor sudah benar
use PDF;

class AdminGRController extends Controller
{
    public function showDashboard()
    {
        return view('adminGR.dashboard'); 
    }

    public function callNextQueue($jenisAntrian)
    {
        $queue = DataQueuing::where('jenis_antrian', $jenisAntrian)
            ->where('status', 'waiting')
            ->orderBy('created_at', 'asc')
            ->first();

        if ($queue) {
            $queue->update(['status' => 'called', 'waktu_pemanggilan' => now()]);
            return view('adminGR.call', compact('queue'));
        } else {
            return view('adminGR.no-call', ['jenisAntrian' => $jenisAntrian]);
        }
    }

    public function showReport(Request $request)
    {
        $queues = DataQueuing::with('customer')
            ->where('jenis_antrian', 'GR')
            ->where('status', 'called')
            ->paginate(10);

        foreach ($queues as $queue) {
            $queue->waktu_pengambilan = $this->formatDate($queue->waktu_pengambilan);
            $queue->waktu_pemanggilan = $this->formatDate($queue->waktu_pemanggilan);
        }

        return view('adminGR.report', compact('queues'));
    }

    public function exportExcel()
    {
        return Excel::download(new QueuesGRExport, 'laporan_antrian_gr.xlsx');
    }

    public function exportPDF()
    {
        $queues = DataQueuing::with('customer')
            ->where('jenis_antrian', 'GR')
            ->where('status', 'called')
            ->get();

        $pdf = PDF::loadView('adminGR.export_pdf', compact('queues'));
        return $pdf->download('laporan_antrian_gr.pdf');
    }

    private function formatDate($date)
    {
        if ($date instanceof Carbon) {
            return $date->format('d-m-Y H:i:s');
        } else {
            return Carbon::parse($date)->format('d-m-Y H:i:s');
        }
    }
}
