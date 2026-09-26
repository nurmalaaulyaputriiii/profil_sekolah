<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prestasis = Prestasi::orderBy('id_prestasi', 'desc')->get();

    return view('admin.prestasi.prestasi', compact('prestasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $request->validate([
        'nama_prestasi' => 'required|string|max:100',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tahun_ajaran' => 'required|string|max:20',
    ]);

    $foto = null;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('prestasi', 'public');
    }

    \App\Models\Prestasi::create([
        'nama_prestasi' => $request->nama_prestasi,
        'deskripsi' => $request->deskripsi,
        'foto' => $foto,
        'tahun_ajaran' => $request->tahun_ajaran,
    ]);

    return redirect()
        ->route('admin.prestasi.prestasi')
        ->with('success', 'Data prestasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
       $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.edit', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $data = $request->only([
            'nama_prestasi',
            'deskripsi',
            'tahun_ajaran',
        ]);

        // JIKA ADA FOTO BARU
        if ($request->hasFile('foto')) {

            // HAPUS FOTO LAMA
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            // SIMPAN FOTO BARU
            $data['foto'] = $request->file('foto')
                ->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()
            ->route('admin.prestasi.prestasi')
            ->with('success', 'Data prestasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $id)
    {
        //
        $prestasi = Prestasi::findOrFail($id);

        // HAPUS FOTO
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.prestasi')
            ->with('success', 'Data prestasi berhasil dihapus!');
    }
}
