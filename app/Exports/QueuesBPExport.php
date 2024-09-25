<?php

namespace App\Exports;

use App\Models\DataQueuing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QueuesBPExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DataQueuing::with('customer')
            ->where('jenis_antrian', 'BP')
            ->where('status', 'called')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No Polisi',
            'Jenis Antrian',
            'Waktu Pemanggilan',
            'Status',
        ];
    }
}
