<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        $mahasiswa->makul()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
    }
}
