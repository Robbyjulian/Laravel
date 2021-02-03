<?php

namespace App\Http\Controllers;

use App\makul;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\mahasiswaExport;
use App\Imports\MahasiswaImport;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
// use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mahasiswa = DB::table('mahasiswa')->paginate(3);
        // return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
        $mahasiswa = Mahasiswa::paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);

        $mahasiswa = mahasiswa::create([
            'nrp' => $request->nrp,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email
        ]);
        return redirect()->route('mahasiswa')->with('message', 'Data berhasil disimpan.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nrp' => 'required|max:9|min:3',
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'email' => 'required|email'
            ],
            [
                'nrp.required' => 'Tidak boleh kosong',
                'nrp.max' => 'Maksimal 9 digit',
                'nrp.min' => 'Minimal 3 digit',
                'nama_depan.required' => 'Harus Diisi',
                'nama_belakang.required' => 'Harus Diisi',
                'email.required' => 'Harus Diisi dengan email'
            ]
        );
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // dd($request->all());
        $this->_validation($request);
        Mahasiswa::where('id', $mahasiswa->id)->update([
            'nrp' => $request->nrp,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email
        ]);
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $mahasiswa->avatar = $request->file('avatar')->getClientOriginalName();
            $mahasiswa->save();
        }
        return redirect()->route('mahasiswa')->with('message', 'Data berhasil diupdate.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        DB::table('mahasiswa')->where('id', $mahasiswa->id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus.!');
        // echo $mahasiswa;
    }
    public function profile(Mahasiswa $mahasiswa)
    {

        Mahasiswa::find($mahasiswa);
        $makul = makul::all();

        //menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach ($makul as $mk) {
            if ($mahasiswa->makul()->wherePivot('makul_id', $mk->id)->first()) {
                $categories[] = $mk->nama;
                $nilai[] = $mahasiswa->makul()->wherePivot('makul_id', $mk->id)->first()->pivot->nilai;
            }
        }

        // dd(json_encode($categories));
        // dd($data);

        return view('mahasiswa.profile', compact('mahasiswa', 'makul', 'categories', 'nilai'));
    }
    public function addnilai(Request $request, $idmahasiswa)
    {
        // dd($request->all());
        $mahasiswa = Mahasiswa::find($idmahasiswa);
        if ($mahasiswa->makul()->where('makul_id', $request->makul)->exists()) {
            return redirect('mahasiswa/' . $idmahasiswa . '/profile')->with('error', 'Mata Kuliah Sudah Ada.!');
        }
        $mahasiswa->makul()->attach($request->makul, ['nilai' => $request->nilai]);

        return redirect('mahasiswa/' . $idmahasiswa . '/profile')->with('message', 'Mata Kuliah Berhasil Ditambahkan.!');
    }

    public function deletenilai($idmahasiswa, $idmakul)
    {
        $mahasiswa = Mahasiswa::find($idmahasiswa);
        $mahasiswa->makul()->detach($idmakul);
        return redirect()->back()->with('message', 'Data Nilai Berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new MahasiswaExport, 'Mahasiswa.xlsx');
    }
    public function exportPdf()
    {
        // $pdf = PDF::loadHTML('<h1>Data Mahasiswa</h1>');
        // $pdf = PDF::loadHTML('export.mahasiswapdf', ['mahasiswa' => $mahasiswa]);
        $mahasiswa = Mahasiswa::all();
        $pdf = PDF::loadView('export.exportpdf', ['mahasiswa' => $mahasiswa]);
        // $pdf = PDF::loadView('export.exportpdf', ['mahasiswa' => $mahasiswa]);
        return $pdf->download('Mahasiswa.pdf');
    }
    public function importExcel(Request $request)
    {
        Excel::import(new MahasiswaImport, $request->file('data_mahasiswa'));
    }
}
