<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pengumuman = Pengumuman::with('user')
            ->when($search, function ($query, $search) {
                $query->where('judul', 'like', '%' . $search . '%');
            })
            ->orderBy('id_pengumuman', 'desc')
            ->get();

        return view('admin.pengumuman.pengumuman', compact('pengumuman', 'search'));
    }

    public function create()
    {
        $users = User::all();

        return view('admin.pengumuman.create', compact('users'));
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required|exists:user,id_user',
            'slug' => 'required|unique:pengumumen,slug'
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.pengumuman.pengumuman')
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $pengumuman = Pengumuman::where('id_pengumuman', $id)->firstOrFail();
        $users = User::all();

        return view('admin.pengumuman.edit', compact('pengumuman', 'users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $pengumuman = Pengumuman::where('id_pengumuman', $id)->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required|exists:user,id_user',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.pengumuman.pengumuman')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $pengumuman = Pengumuman::where('id_pengumuman', $id)->firstOrFail();
        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.pengumuman')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}
