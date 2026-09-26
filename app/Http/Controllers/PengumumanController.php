<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::with('user')
            ->orderBy('id_pengumuman', 'desc')
            ->get();

        return view(
            'admin.pengumuman.pengumuman',
            compact('pengumuman')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view(
            'admin.pengumuman.create',
            compact('users')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required|exists:user,id_user',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.pengumuman.pengumuman')
            ->with(
                'success',
                'Pengumuman berhasil ditambahkan!'
            );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $users = User::all();

        return view(
            'admin.pengumuman.edit',
            compact('pengumuman', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required|exists:user,id_user',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.pengumuman.pengumuman')
            ->with(
                'success',
                'Pengumuman berhasil diperbarui!'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.pengumuman')
            ->with(
                'success',
                'Pengumuman berhasil dihapus!'
            );
    }
}
