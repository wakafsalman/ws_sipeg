<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WsSipegController extends Controller
{

    public function index(){

        $judul = 'Beranda';
        return view('main', compact(['judul']));

    }


}
