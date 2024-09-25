<?php

namespace App\Exports;

use App\Models\DataQueuing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QueuesGRExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DataQueuing::with('customer')
            ->where('jenis_antrian', 'GR')
            ->where('status', 'called')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nomor Polisi',
            'Jenis Antrian',
            'Waktu Pemanggilan',
            'Status',
        ];
    }
}
