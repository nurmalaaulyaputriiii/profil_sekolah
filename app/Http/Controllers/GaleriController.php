<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $galeri = Galeri::when($search, function ($query, $search) {
            $query->where('judul', 'like', '%' . $search . '%');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.galeri.galeri', compact('galeri', 'search'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()
            ->route('admin.galeri.galeri')
            ->with('success', 'Data galeri berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $id = Crypt::decryptString($id);

        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(string $id)
    {
        $id = Crypt::decryptString($id);

        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, string $id)
    {
        $id = Crypt::decryptString($id);

        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            if ($galeri->file) {
                Storage::disk('public')->delete($galeri->file);
            }

            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.galeri')
            ->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $id = Crypt::decryptString($id);

        $galeri = Galeri::findOrFail($id);

        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.galeri')
            ->with('success', 'Data galeri berhasil dihapus!');
    }
}
