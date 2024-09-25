<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataQueuing;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QueuesBPExport;
use PDF;

class AdminBPController extends Controller
{

    public function showBPDashboard()
    {
        return view('adminBP.dashboard');
    }

    public function callNextQueue($jenisAntrian)
    {
        $queue = DataQueuing::where('jenis_antrian', $jenisAntrian)
            ->where('status', 'waiting')
            ->orderBy('created_at', 'asc')
            ->first();

        if ($queue) {
            $queue->update(['status' => 'called', 'waktu_pemanggilan' => now()]);
            return view('adminBP.call', compact('queue'));
        } else {
            return view('adminBP.no-call', ['jenisAntrian' => $jenisAntrian]);
        }
    }

    public function showReport(Request $request)
    {
        $queues = DataQueuing::with('customer')
            ->where('jenis_antrian', 'BP')
            ->where('status', 'called')
            ->paginate(10);

        foreach ($queues as $queue) {
            $queue->waktu_pengambilan = $this->formatDate($queue->waktu_pengambilan);
            $queue->waktu_pemanggilan = $this->formatDate($queue->waktu_pemanggilan);
        }

        return view('adminBP.report', compact('queues'));
    }

    public function exportExcel()
    {
        return Excel::download(new QueuesBPExport, 'laporan_antrian_bp.xlsx');
    }

    public function exportPDF()
    {
        $queues = DataQueuing::with('customer')
            ->where('jenis_antrian', 'BP')
            ->where('status', 'called')
            ->get();

        $pdf = PDF::loadView('adminBP.export_pdf', compact('queues'));
        return $pdf->download('laporan_antrian_bp.pdf');
    }

    private function formatDate($date)
    {
        return $date instanceof Carbon ? 
            $date->format('d-m-Y H:i:s') : 
            Carbon::parse($date)->format('d-m-Y H:i:s');
    }
}
