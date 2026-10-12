<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $siswa = Siswa::when($search, function ($query, $search) {
            $query->where('nama_siswa', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('tahun_masuk', 'like', '%' . $search . '%')
                ->orWhere('id_kelas', 'like', '%' . $search . '%');
        })
        ->orderBy('nama_siswa', 'asc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.siswa.siswa', compact('siswa', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'tahun_masuk' => 'required|integer',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kelas' => $request->kelas,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.siswa')
            ->with('success', 'Data siswa berhasil ditambahkan.');
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

        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
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

        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'kelas' => 'required|exists:kelas,id_kelas',
            'tahun_masuk' => 'required|integer',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kelas' => $request->kelas,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
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

        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
