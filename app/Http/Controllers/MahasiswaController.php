<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        // dd($mahasiswa);
        return view('mahasiswa.index')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Mahasiswa::class)) {
            abort(403);
        }
        // validasi input
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'asal_sma' => 'required',
            'prodi_id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //upload foto
        if ($request->hasFile('foto')){
            $file = $request->file('foto'); //ambil file foto
            $filename = time() . "." . $file->getClientOriginalExtension(); // bisa pakai npm atau time() agar unique
            $file->move(public_path('images'), $filename); //simpan foto ke folder public/images
            $input['foto'] = $filename; //simpan nama file baru ke $input
        }
        // simpan data ke tabel mahasiswa
        Mahasiswa::create($input);

        // redirect ke route mahasiswa.index
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahnkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa) //$mahasiswa menangkap id yang dikirimkan dari route
    {
        // dd($mahasiswa);
        return view('mahasiswa.show', compact('mahasiswa')); //compact mahasiswa seluai dengan $mahasiswa di atas
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa);
        //validasi input
        // cek apakah user memiliki izin untuk mengupdate fakultas
        if ($request->user()->cannot('update', $mahasiswa)) {
            abort(403);   
        }
        $input = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'asal_sma' => 'required',
            'prodi_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //kyknyo tambah ini
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            // simpan nama file ke dalam input
            $input['foto'] = $filename;
            // hapus foto lama
            if ($mahasiswa->foto && file_exists(public_path('images/' . $mahasiswa->foto))) {
                unlink(public_path('images/' . $mahasiswa->foto));
            }
        } else {
            $input['foto'] = $mahasiswa->foto;
        }
        
        // update data fakultas
        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Mahasiswa $mahasiswa)
    {
        if ($request->user()->cannot('delete', $mahasiswa)) {
            abort(403);
        }
        $mahasiswa->delete();
        if ($mahasiswa->foto){
            $fotoPath = public_path('images/' . $mahasiswa->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath); //hapus foto dari folder public/images
            }
        }
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa a.n. '. $mahasiswa->nama.' berhasil dihapus.');
    }
}
