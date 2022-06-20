<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dosen;

class DosenController extends Controller
{
    public function dosen()
    {
        $dosen = Dosen::query()
        ->orderBy('nidn', 'desc')
        ->paginate(10);
        return view('dosen', ['dosen' => $dosen]);
    }

    public function cari(Request $request)
    {
        $cari = $request -> cari;
        $dosen = Dosen::where('nama', 'like', '%'.$cari.'%')
        ->orWhere('nidn', 'like', '%'.$cari.'%')
        ->paginate();
        return view('dosen', ['dosen' => $dosen]);
    }

    public function formulirdosen()
    {
        return view('formulirdosen');
    }

    public function simpandosen(Request $request)
    {
        $pakar = implode(',',$request->pakar);
        Dosen::create([
            'nidn' => $request -> nidn,
            'nama' => $request -> nama,
            'status' => $request -> status,
            'jafung' => $request -> jafung,
            'pakar' => $pakar
        ]);
        return redirect('/dosen')-> with ('alert-info', 'Data Berhasil Di Simpan!');
    }

    public function editdosen($id)
    {
        $dosen = Dosen::find($id);
        return view('editdosen', ['dosen' => $dosen]);
    }

    public function updatedosen($id, Request $request)
    {
        $pakar = implode(',',$request->pakar);
        $dosen = Dosen::find($id);
        $dosen -> nidn = $request -> nidn;
        $dosen -> nama = $request -> nama;
        $dosen -> status = $request -> status;
        $dosen -> jafung = $request -> jafung;
        $dosen -> pakar = $pakar;
        $dosen -> save();
        return redirect('/dosen')-> with ('alert-success', 'Data Berhasil Di Ubah!');
    }

    public function deletedosen($id)
    {
        $dosen = Dosen::find($id);
        $dosen -> delete();
        return redirect('/dosen')-> with ('alert-danger', 'Data Berhasil Di Hapus!');
    }
}
