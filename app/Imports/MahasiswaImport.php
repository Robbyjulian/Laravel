<?php

namespace App\Imports;

use App\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                // $tanggal_lahir = ($row[5] - 25569) * 86400;
                Mahasiswa::create([
                    'nrp' => $row[0],
                    'nama_depan' => $row[1],
                    'nama_belakang' => ' ',
                    'email' => $row[2],
                    // 'tanggal_lahir' => gmdate('Y-m-d',$tanggal_lahir),
                ]);
            }
        }
    }
}
