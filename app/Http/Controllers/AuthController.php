<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class AuthController extends Controller
{
    public function user()
    {
        $user = User::paginate(5);
        return view('user', ['user' => $user]);
    }

    public function formuliruser()
    {
        return view('formuliruser');
    }

    public function simpanuser(Request $request)
    {
        $request->validate([
            'nik_user' => 'bail|required|max:11',
            'nama_user' => 'required|max:255', 
            'no_handphone' => 'required|max:12', 
            'password' => 'required|min:3'
        ]);
        $user = User::create([
            'nik_user' => $request -> nik_user,
            'nama_user' => $request -> nama_user, 
            'no_handphone' => $request -> no_handphone, 
            'password' => md5($request -> password)
        ]);
        return redirect('/user')-> with ('alert-info', 'Data Berhasil Di Simpan!');
    }

    public function edituser($id)
    {
        $user = User::find($id);
        return view('edituser', ['user' => $user]);
    }

    public function updateuser($id, Request $request)
    {
        $request->validate([
            'nik_user' => 'bail|required|max:11',
            'nama_user' => 'required|max:255', 
            'no_handphone' => 'required|max:12', 
            'password' => 'required|min:3'
        ]);

        $user = User::find($id);
        $user -> nik_user = $request -> nik_user;
        $user -> nama_user = $request -> nama_user;
        $user -> no_handphone = $request -> no_handphone;
        $user -> password = md5($request -> password);
        $user -> save();
        return redirect('/user')-> with ('alert-success', 'Data Berhasil Di Ubah!');
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect('/user')-> with ('alert-danger', 'Data Berhasil Di Hapus!');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        $user = User::where('no_handphone', $request->no_handphone)
                ->where('password',md5($request->password))
                ->first();
            if($user){
                Auth::login($user);
                return redirect('/mahasiswa');
            }else{
                return redirect('/login')-> with ('alert-danger', 'No. Handphone atau Password Salah!');
                }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')-> with ('alert-success', 'Anda Berhasil Keluar!');
    }
}
