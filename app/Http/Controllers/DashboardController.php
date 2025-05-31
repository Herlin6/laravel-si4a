<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        //cara 1
        $mahasiswaprodi = DB::select('
            SELECT prodi.nama, count(*) as jumlah
            FROM mahasiswa join prodi
            WHERE mahasiswa.prodi_id = prodi.id
            group by prodi.nama;
        ');
        return view('dashboard.index', compact('mahasiswaprodi'));
    }
}
