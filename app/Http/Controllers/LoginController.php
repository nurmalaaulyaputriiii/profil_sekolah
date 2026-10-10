<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = DB::table('user')->where('username', $request->username)->first();
        if (!$user) {
            return back()->with('error', 'Username atau password salah!')->withInput($request->only('username'));
        }
        $passwordHash = str_starts_with($user->password, '$2y$') || str_starts_with($user->password, '$argon2i$') || str_starts_with($user->password, '$argon2id$');
        $passwordCocok = $passwordHash
            ? Hash::check($request->password, $user->password)
            : $request->password === $user->password;
        if (!$passwordCocok) {
            return back()->with('error', 'Username atau password salah!')->withInput($request->only('username'));
        }
        $userLogin = User::where('id_user', $user->id_user)->first();
        if (!$userLogin) {
            return back()->with('error', 'Data pengguna tidak ditemukan!');
        }
        if (!in_array($userLogin->role, ['Admin', 'Operator'], true)) {
            return back()->with('error', 'Role pengguna tidak valid!');
        }
        if (!$passwordHash) {
            $userLogin->password = Hash::make($request->password);
            $userLogin->save();
        }
        Auth::login($userLogin);
        $request->session()->regenerate();
        session([
            'id_user' => $userLogin->id_user,
            'username' => $userLogin->username,
            'role' => $userLogin->role,
        ]);
        return redirect()->route('admin.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
