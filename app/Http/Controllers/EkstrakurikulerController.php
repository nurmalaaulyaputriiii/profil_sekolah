<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('admin.ektrakurikuler.ektrakurikuler', compact('ekstrakurikuler'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ektrakurikuler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        return view(
            'admin.ektrakurikuler.edit',
            compact('ekstrakurikuler')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
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
