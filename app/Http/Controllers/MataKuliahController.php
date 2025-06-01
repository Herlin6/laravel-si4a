<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = Mata_Kuliah::all();
        return view('mata-kuliah.index')->with('mata_kuliah', $mata_kuliah);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mata-kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request-> validate([
            'kode_mk' => 'required|unique:mata_kuliah',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);
        Mata_Kuliah::create($input);
        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahnkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($mata_kuliah)
    {
        $mata_kuliah = Mata_Kuliah::findOrFail($mata_kuliah);
        return view('mata-kuliah.show', compact('mata_kuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mata_Kuliah $mata_kuliah)
    {
        $prodi = Prodi::all();
        return view('mata-kuliah.edit', compact('mata_kuliah', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mata_Kuliah $mata_kuliah)
    {
        $input = $request-> validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);
        $mata_kuliah->update($input);
        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mata_Kuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
