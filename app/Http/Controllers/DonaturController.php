<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index(){

        $judul      =   'Data Donatur';
        $data       =   Donatur::all();
        return view('donatur/data', compact('judul','data'));

    }

}
