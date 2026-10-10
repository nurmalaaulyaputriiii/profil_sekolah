<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.user', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30|unique:user,username',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Admin,Operator',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.user')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:30|unique:user,username,' . $user->id_user . ',id_user',
            'role' => 'required|in:Admin,Operator',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.user.user')
            ->with('success', 'User berhasil diubah!');
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user.user')
            ->with('success', 'User berhasil dihapus!');
    }
}

