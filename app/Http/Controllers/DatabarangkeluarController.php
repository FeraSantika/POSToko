<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabarangkeluarController extends Controller
{
    public function index(){
        return view('transaksi.barangkeluar.barangkeluar');
    }
}
