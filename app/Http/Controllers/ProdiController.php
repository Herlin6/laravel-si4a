<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model prodi menggunakan eloquent
        $prodi = Prodi::all(); // select * from prodi

        // dd($prodi);
        return view('prodi.index')->with('prodi', $prodi); // selain compact, bisa pakai with() //'prodi' => $prodi di view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Prodi::class)) {
            abort(403);   
        }
        // validasi input
        $input = $request-> validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        // simpan data ke tabel profi
        Prodi::create($input);

        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahnkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
         return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        if ($request->user()->cannot('update', $prodi)) {
            abort(403);   
        }
        //validasi input
        $input = $request-> validate([
            'nama' => 'required',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        $prodi->update($input);
        return redirect()->route('prodi.index')->with('success', 'Profram Studi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Prodi $prodi)
    {
        if ($request->user()->cannot('create', Prodi::class)) {
            abort(403);   
        }
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi a.n. '. $prodi->nama.' berhasil dihapus.');
    }
}
