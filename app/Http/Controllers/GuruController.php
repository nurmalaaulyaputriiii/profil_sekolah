<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $gurus = Guru::with('mataPelajaran')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_guru', 'like', '%' . $search . '%')
                        ->orWhere('nip', 'like', '%' . $search . '%')
                        ->orWhereHas('mataPelajaran', function ($mapel) use ($search) {
                            $mapel->where('nama_mapel', 'like', '%' . $search . '%');
                        });
                });
            })
            ->orderBy('nama_guru', 'asc')
            ->get();

        return view('admin.guru.guru', compact('gurus', 'search'));
    }

    public function create()
    {
        $mataPelajaran = MataPelajaran::orderBy('nama_mapel', 'asc')->get();

        return view('admin.guru.create', compact('mataPelajaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'required|string|max:15|unique:guru,nip',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'id_mapel.required' => 'Mata pelajaran wajib dipilih.',
            'id_mapel.exists' => 'Mata pelajaran tidak valid.',
            'foto.required' => 'Foto guru wajib diupload.',
            'foto.image' => 'File yang diupload harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'id_mapel' => $request->id_mapel,
            'foto' => $request->file('foto')->store('foto_guru', 'public'),
        ];

        Guru::create($data);

        return redirect()
            ->route('admin.guru.guru')
            ->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $guru = Guru::findOrFail($id);
        $mataPelajaran = MataPelajaran::orderBy('nama_mapel', 'asc')->get();

        return view('admin.guru.edit', compact('guru', 'mataPelajaran'));
    }

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
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'id_mapel.required' => 'Mata pelajaran wajib dipilih.',
            'id_mapel.exists' => 'Mata pelajaran tidak valid.',
            'foto.image' => 'File yang diupload harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'id_mapel' => $request->id_mapel,
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
