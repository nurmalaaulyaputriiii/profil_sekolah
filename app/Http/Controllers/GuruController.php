<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt; //untuk enkripsi dan dekripsi ID guru

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $gurus = Guru::when($search, function ($query, $search) {
            $query->where('nama_guru', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%')
                ->orWhere('mapel', 'like', '%' . $search . '%');
        })
        ->orderBy('nama_guru', 'asc')
        ->get();

        return view('admin.guru.guru', compact('gurus', 'search'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            //validasi inputan form
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15|unique:guru,nip',
            'mapel' => 'required|string|max:40',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            //validasi pesan error
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'mapel.required' => 'Mata pelajaran wajib diisi.',
            'foto.required' => 'Foto guru wajib diupload.',
            'foto.image' => 'File yang diupload harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $request->file('foto')->store('foto_guru', 'public'),
        ];

        Guru::create($data);

        return redirect()
            ->route('admin.guru.guru')
            ->with('success', 'Data guru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $guru = Guru::findOrFail($id);

        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);//deskripsi ID guru yang diterima dari parameter
        } catch (\Exception $e) { //ambil data  guru berdasarkan id yg di enkripsi
            abort(404);
        }

        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15|unique:guru,nip,' . $guru->id_guru . ',id_guru',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
        ];

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('admin.guru.guru')
            ->with('success', 'Data guru berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $guru = Guru::findOrFail($id);

        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru.guru')
            ->with('success', 'Data guru berhasil dihapus!');
    }
}
