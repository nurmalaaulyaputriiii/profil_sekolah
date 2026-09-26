<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();

        return view('admin.guru.guru', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|string|max:15|unique:guru,nip',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('admin.guru.guru')
            ->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function show(Guru $guru)
    {
        //
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|string|max:15|unique:guru,nip,' . $guru->id_guru . ',id_guru',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
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

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru.guru')
            ->with('success', 'Data guru berhasil dihapus!');
    }
}
