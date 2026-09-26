<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan username
        $user = DB::table('user')
            ->where('username', $request->username)
            ->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()
                ->with('error', 'Username atau password salah!')
                ->withInput($request->only('username'));
        }

        $passwordCocok = false;

        // Cek apakah password sudah berbentuk hash
        if (
            str_starts_with($user->password, '$2y$') ||
            str_starts_with($user->password, '$argon2i$') ||
            str_starts_with($user->password, '$argon2id$')
        ) {
            // Password sudah di-hash
            $passwordCocok = Hash::check(
                $request->password,
                $user->password
            );
        } else {
            // Password masih berupa teks biasa
            $passwordCocok = ($request->password === $user->password);
        }

        // Jika password salah
        if (!$passwordCocok) {
            return back()
                ->with('error', 'Username atau password salah!')
                ->withInput($request->only('username'));
        }

        // Jika password masih teks biasa, ubah menjadi hash
        if (
            !str_starts_with($user->password, '$2y$') &&
            !str_starts_with($user->password, '$argon2i$') &&
            !str_starts_with($user->password, '$argon2id$')
        ) {
            DB::table('user')
                ->where('id_user', $user->id_user)
                ->update([
                    'password' => Hash::make($request->password)
                ]);
        }

        // Regenerasi session
        $request->session()->regenerate();

        // Simpan data user ke session
        session([
            'id_user' => $user->id_user,
            'username' => $user->username,
            'role' => $user->role,
        ]);

        // Masuk ke dashboard
        return redirect()->route('admin.dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
