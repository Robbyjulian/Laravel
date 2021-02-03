<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mahasiswa::all();
    }

    public function map($mahasiswa): array
    {
        return [
            $mahasiswa->nrp,
            $mahasiswa->nama_lengkap(),
            $mahasiswa->email,
            $mahasiswa->rataNilai()
        ];
    }

    public function headings(): array
    {
        return [
            'NRP',
            'Nama Lengkap',
            'E-Mail',
            'Rata-rata Nilai',
        ];
    }
}
