<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $ekstrakurikuler = Ekstrakurikuler::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_ekskul', 'like', '%' . $search . '%')
                    ->orWhere('pembina', 'like', '%' . $search . '%');
            });
        })
        ->orderBy('id_ekskul', 'desc')
        ->get();

        return view(
            'admin.ektrakurikuler.ektrakurikuler',
            compact('ekstrakurikuler', 'search')
        );
    }

    public function create()
    {
        return view('admin.ektrakurikuler.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->nama_ekskul);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'slug' => 'required|unique:ekstrakurikuler,slug'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'slug' => $request->slug,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        return view(
            'admin.ektrakurikuler.edit',
            compact('ekstrakurikuler')
        );
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $ekstrakurikuler->gambar;

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete(
                    $ekstrakurikuler->gambar
                );
            }

            $gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        if ($ekstrakurikuler->gambar) {
            Storage::disk('public')->delete(
                $ekstrakurikuler->gambar
            );
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus!');
    }
}
