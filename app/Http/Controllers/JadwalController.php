<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mata_Kuliah;
use App\Models\Sesi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index')->with('jadwal', $jadwal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliah = Mata_Kuliah::all();
        $user = User::all();
        $sesi = Sesi::all();
        return view('jadwal.create', compact('mata_kuliah', 'sesi', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $input = $request-> validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'user_id' => 'required',
            'sesi_id' => 'required',
        ]);
        Jadwal::create($input);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahnkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        // dd($jadwal);
        $mata_kuliah = Mata_Kuliah::all();
        $sesi = Sesi::all();
        $user = User::all();
        return view('jadwal.edit', compact('jadwal', 'mata_kuliah', 'sesi', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $input = $request-> validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'user_id' => 'required',
            'sesi_id' => 'required',
        ]);
        $jadwal->update($input);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
