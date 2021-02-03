<?php

use App\Mahasiswa;
use App\dosen;

function Ranking()
{
    $mahasiswa = Mahasiswa::all();
    $mahasiswa->map(function ($m) {
        $m->rataNilai = $m->rataNilai();
        return $m;
    });
    $mahasiswa = $mahasiswa->sortByDesc('rataNilai')->take(5);
    // dd($mahasiswa);
    return $mahasiswa;
}

function totalMahasiswa()
{
    return Mahasiswa::count('id');
}
function totalDosen()
{
    return dosen::count('id');
}
