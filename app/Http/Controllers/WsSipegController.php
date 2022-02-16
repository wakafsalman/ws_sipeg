<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
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

        $judul = 'Beranda';
        $jumlah = Pegawai::count();
        return view('main', compact('judul','jumlah'));

    }

    public function proses_login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/beranda');
        }

        return redirect('/');

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
