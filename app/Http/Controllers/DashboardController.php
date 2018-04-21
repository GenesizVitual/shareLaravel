<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('content.dashboard.dashboard_utama');
    }

    public function index_toko()
    {
        Session::put('mode_aplikasi',1);
        return view('content.dashboard.dashboard_toko');
    }

    public function index_instansi()
    {
        Session::put('mode_aplikasi',2);
        return view('content.dashboard.dashboard_instansi');
    }

}
