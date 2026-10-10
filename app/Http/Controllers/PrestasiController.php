<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $prestasis = Prestasi::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_prestasi', 'like', '%' . $search . '%')
                    ->orWhere('tahun_ajaran', 'like', '%' . $search . '%');
            });
        })
        ->orderBy('id_prestasi', 'desc')
        ->get();

        return view('admin.prestasi.prestasi', compact('prestasis', 'search'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->nama_prestasi);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|string|max:20',
            'slug' => 'required|unique:prestasis,slug'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()
            ->route('admin.prestasi.prestasi')
            ->with('success', 'Data prestasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()
            ->route('admin.prestasi.prestasi')
            ->with('success', 'Data prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()
            ->route('admin.prestasi.prestasi')
            ->with('success', 'Data prestasi berhasil dihapus!');
    }
}
