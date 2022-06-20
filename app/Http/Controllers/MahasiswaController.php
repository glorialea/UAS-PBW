<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        $mahasiswa = Mahasiswa::query()
        ->orderBy('nim', 'desc')
        ->paginate(10);
        return view('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function cari(Request $request)
    {
        $cari = $request -> cari;
        $mahasiswa = Mahasiswa::where('nama', 'like', '%'.$cari.'%')
        ->orWhere('nim', 'like', '%'.$cari.'%')
        ->paginate();
        return view('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function formulirmahasiswa()
    {
        return view('formulirmahasiswa');
    }

    public function simpanmahasiswa(Request $request)
    {
        $bidang_minat = implode(',',$request->bidang_minat);
        Mahasiswa::create([
            'nim' => $request -> nim,
            'nama' => $request -> nama,
            'gender' => $request -> gender,
            'jurusan' => $request -> jurusan,
            'bidang_minat' => $bidang_minat
        ]);
        return redirect('/mahasiswa')-> with ('alert-info', 'Data Berhasil Di Simpan!');
    }

    public function editmhs($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('editmhs', ['mahasiswa' => $mahasiswa]);
    }

    public function updatemhs($id, Request $request)
    {
        $bidang_minat = implode(',',$request->bidang_minat);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa -> nim = $request -> nim;
        $mahasiswa -> nama = $request -> nama;
        $mahasiswa -> gender = $request -> gender;
        $mahasiswa -> jurusan = $request -> jurusan;
        $mahasiswa -> bidang_minat = $bidang_minat;
        $mahasiswa -> save();
        return redirect('/mahasiswa')-> with ('alert-success', 'Data Berhasil Di Ubah!');
    }

    public function deletemhs($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa -> delete();
        return redirect('/mahasiswa')-> with ('alert-danger', 'Data Berhasil Di Hapus!');
    }
}
