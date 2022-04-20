<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\KodeKpi;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class WsSipegController extends Controller
{

    public function index(){

        $judul = 'Sistem Employee Wakaf Salman ITB';
        return view('login', compact('judul'));

    }

    public function beranda(){

        $judul          = 'Beranda';
        $jumlah         = Pegawai::count();
        $jabatan        = Jabatan::all();
        $kode_kpi       = KodeKpi::all();
        return view('main', compact('judul','jumlah','jabatan','kode_kpi'));

    }

    public function proses_login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/beranda')->with('success', 'Berhasil login');
            
        }

        return redirect('/')->with('error', 'Username dan password tidak sesuai. Silahkan coba lagi atau buat password yang baru');

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function profil(){

        $judul = 'Profil';
        return view('profil', compact('judul'));


    }

    public function rubah_profil(Request $request, $id){

        $data = User::find($id);
        $data_update=[
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $data->update($data_update);
        if($request->hasFile('foto')){
            $gambar = $request->email.".".$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('img/profil/', $gambar);
            $data->foto = $gambar;
            $data->save();
        }
        return redirect()->route('profil')->with('success', 'Data berhasil dirubah');

    }

    public function reset(){

        $judul = 'Sistem Employee Wakaf Salman ITB';
        return view('reset', compact('judul'));

    }

    public function reset_password(Request $request){

        $data = User::where('email', $request->email);
        $data_update=[
            'password' => bcrypt($request->password),
        ];
        $data->update($data_update);
        return redirect()->route('reset')->with('success', 'Anda sudah berhasil membuat password baru. Silahkan login ke Sistem Employee Wakaf Salman ITB');

    }

}
