<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Berita;
use App\Models\Dashboard;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahUser = User::count();
        $jumlahPrestasi = Prestasi::count();
        $jumlahBerita = Berita::count();
        $jumlahPengumuman = Pengumuman::count();
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();
        $jumlahGaleri = Galeri::count();

        $guruTerbaru = Guru::orderBy('id_guru', 'desc')
            ->take(5)
            ->get();

        $beritaTerbaru = Berita::orderBy('id_berita', 'desc')
            ->take(5)
            ->get();

        $pengumumanTerbaru = Pengumuman::orderBy('id_pengumuman', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahUser',
            'jumlahPrestasi',
            'jumlahBerita',
            'jumlahPengumuman',
            'jumlahEkstrakurikuler',
            'jumlahGaleri',
            'guruTerbaru',
            'beritaTerbaru',
            'pengumumanTerbaru'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
