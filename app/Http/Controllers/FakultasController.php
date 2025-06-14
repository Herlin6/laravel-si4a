<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model fakultas menggunakan eloquent
        $fakultas = Fakultas::all(); // perintah sql select * from fakultas

        // dd($fakultas); //dump and die //die=>baris dibawah tidak diproses //untuk melihat isi dari variabel fakultas
        return view('fakultas.index', compact('fakultas')); // mengirim data fakultas ke view fakultas.index //selain compact, bisa pakai with()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create'); // menampilkan form untuk menambah data fakultas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat fakultas
        if ($request->user()->cannot('create', Fakultas::class)) {
            abort(403);   
        }
        // validasi input
        $input = $request-> validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);
        // simpan data ke tabel fakultas
        Fakultas::create($input); //insert into fakultas values $input

        // redirect ke route fakultas.index
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($fakultas)
    {
        // dd($fakultas); //atribut tidak muncul, jadi harus pakai find or fail dan show( Fakultas $fakultas) jadi show($fakultas)
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakultas);
        return view('fakultas.show', compact('fakultas')); // mengirim data fakultas ke view fakultas.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        return view('fakultas.edit', compact('fakultas')); // menampilkan form untuk mengedit data fakultas
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // cek apakah user memiliki izin untuk mengupdate fakultas
        if ($request->user()->cannot('update', $fakultas)) {
            abort(403);   
        }
        //validasi input
        $input = $request-> validate([
            'nama' => 'required',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);
        // update data fakultas
        $fakultas->update($input);
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $fakultas)
    {
        // dd($fakultas);
        $fakultas = Fakultas::findOrFail($fakultas);
        // cek apakah user memiliki izin untuk delete fakultas
        if ($request->user()->cannot('delete', $fakultas)) {
            abort(403);   
        }
        // dd($fakultas);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas a.n. '. $fakultas->nama.' berhasil dihapus.');
    }
}
