<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    // Menampilkan halaman profil
    public function index()
    {
        $profil = Profil::first();

        return view('admin.profil.profil', compact('profil'));
    }

    // Menampilkan form tambah atau edit
    public function edit()
    {
        $profil = Profil::first();

        return view('admin.profil.edit', compact('profil'));
    }

    // Menyimpan data baru atau memperbarui data lama
    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_sekolah' => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'visi_misi' => 'required|string',
            'tahun_berdiri' => 'required|integer',
            'deskripsi' => 'required|string',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil data profil yang sudah ada
        $profil = Profil::first();

        // Jika belum ada, buat data baru
        if (!$profil) {
            $profil = new Profil();

            // Kolom foto dan logo pada migration tidak nullable
            $profil->foto = '';
            $profil->logo = '';
        }

        // Upload foto sekolah
        if ($request->hasFile('foto')) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('foto_profil', 'public');
        }

        // Upload logo sekolah
        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }

            $data['logo'] = $request->file('logo')
                ->store('logo_profil', 'public');
        }

        // Isi data dan simpan
        $profil->fill($data);
        $profil->save();

        return redirect()
            ->route('admin.profil.profil')
            ->with('success', 'Profil sekolah berhasil disimpan.');
    }
}
