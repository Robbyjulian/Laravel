<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(5);
        return view('index', compact('mahasiswa'));
    }
}
