<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Profil;
use App\Models\Siswa;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $guru = Guru::latest('id_guru')->get();
        $prestasi = Prestasi::latest('id_prestasi')->get();
        $ekstrakurikuler = Ekstrakurikuler::latest('id_ekskul')->get();
        $berita = Berita::latest('id_berita')->get();
        $galeri = Galeri::latest('id_galeri')->get();
        $pengumuman = Pengumuman::latest('id_pengumuman')->get();

        $siswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahPrestasi = Prestasi::count();
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();

        return view('landing', compact(
            'profil',
            'guru',
            'prestasi',
            'ekstrakurikuler',
            'berita',
            'galeri',
            'pengumuman',
            'siswa',
            'jumlahGuru',
            'jumlahPrestasi',
            'jumlahEkstrakurikuler'
        ));
    }

    public function profil()
    {
        $profil = Profil::firstOrFail();

        return view('landing.profil', compact('profil'));
    }

    public function guru()
    {
        $profil = Profil::first();
        $guru = Guru::latest('id_guru')->get();

        return view('landing.guru', compact('profil', 'guru'));
    }

    public function guruDetail($id)
    {
        $id = Crypt::decryptString($id);

        $profil = Profil::first();
        $guru = Guru::findOrFail($id);

        return view('landing.gurudetail', compact('profil', 'guru'));
    }

    public function prestasi()
    {
        $profil = Profil::first();
        $prestasi = Prestasi::latest('id_prestasi')->get();

        return view('landing.prestasi', compact('profil', 'prestasi'));
    }

    public function prestasiDetail($slug)
    {
        $profil = Profil::first();

        $prestasi = Prestasi::where('slug', $slug)
            ->firstOrFail();

        return view('landing.prestasidetail', compact('profil', 'prestasi'));
    }

    public function ekstrakurikuler()
    {
        $profil = Profil::first();
        $ekstrakurikuler = Ekstrakurikuler::latest('id_ekskul')->get();

        return view('landing.ekstrakurikuler', compact('profil', 'ekstrakurikuler'));
    }

    public function ekstrakurikulerDetail($slug)
    {
        $profil = Profil::first();

        $ekstrakurikuler = Ekstrakurikuler::where('slug', $slug)
            ->firstOrFail();

        return view('landing.ekstrakurikulerdetail', compact('profil', 'ekstrakurikuler'));
    }

    public function berita()
    {
        $profil = Profil::first();
        $berita = Berita::latest('id_berita')->get();

        return view('landing.berita', compact('profil', 'berita'));
    }

    public function beritaDetail($slug)
    {
        $profil = Profil::first();

        $berita = Berita::where('slug', $slug)
            ->where('status', 'Publish')
            ->firstOrFail();

        return view('landing.beritadetail', compact('profil', 'berita'));
    }

    public function galeri()
    {
        $profil = Profil::first();
        $galeri = Galeri::latest('id_galeri')->get();

        return view('landing.galeri', compact('profil', 'galeri'));
    }

    public function galeriDetail($id)
    {
        $id = Crypt::decryptString($id);

        $profil = Profil::first();
        $galeri = Galeri::findOrFail($id);

        return view('landing.galeridetail', compact('profil', 'galeri'));
    }

    public function pengumuman()
    {
        $profil = Profil::first();
        $pengumuman = Pengumuman::latest('id_pengumuman')->get();

        return view('landing.pengumuman', compact('profil', 'pengumuman'));
    }

    public function pengumumanDetail($slug)
    {
        $profil = Profil::first();

        $pengumuman = Pengumuman::where('slug', $slug)
            ->where('status', 'Publish')
            ->firstOrFail();

        return view('landing.pengumumandetail', compact('profil', 'pengumuman'));
    }


public function siswa()
{
    $siswa = \App\Models\Siswa::orderBy('nama_siswa', 'asc')->paginate(10);
    $jumlahSiswa = \App\Models\Siswa::count();
    $profil = \App\Models\Profil::first();

    return view('landing.siswa', compact('siswa', 'jumlahSiswa', 'profil'));
}
public function profilSaya()
{
    $profil = \App\Models\Profil::first();
    return view('landing.Profilsaya',compact('profil'));
}
}
