<?php

namespace App\Http\Controllers\Konfigurasi;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setup = Setup::get();
        return view('Setups.setup', ['setup' => $setup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $setup = new Setup;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->save();
        $this->_validation($request);
        Setup::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function show(Setup $setup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_aplikasi' => 'required|min:3',
                'jumlah_hari_kerja' => 'required|max:9|min:2'
            ],
            [
                'nama_aplikasi.required' => 'Tidak boleh kosong',
                'nama_aplikasi.min' => 'Minimal 3 Digit',
                'jumlah_hari kerja.required' => 'Tidak boleh kosong',
                'jumlah_hari kerja.min' => 'Minimal 1 Hari',
                'jumlah_hari kerja.max' => 'Maksimal 31 Hari',
            ]
        );
    }

    public function edit(Setup $setup)
    {
        // $data = Setup::find($setup->id);
        // return view('setups.setup-edit', ['data' => $data]);
        return view('setups.setup-edit', compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setup $setup)
    {
        // $this->_validation($request);
        $validation = Validator::make(
            $request->all(),
            [
                'nama_aplikasi' => 'required|min:3',
                'jumlah_hari_kerja' => 'required|max:9|min:2'
            ],
            [
                'nama_aplikasi.required' => '* Tidak Boleh Kosong',
                'jumlah_hari_kerja.required' => '* Tidak Boleh Kosong'
            ]
        );

        if ($validation->validate()) {

            Setup::where('id', $setup->id)->update([
                'jumlah_hari_kerja' => $request->jumlah_hari_kerja,
                'nama_aplikasi' => $request->nama_aplikasi
            ]);
            return response()->json(['success' => '1']);
        }
        return response()->json(['errors' => $validation->errors]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setup $setup)
    {
        //
    }
}
