<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        // Ambil daftar pengguna
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    public function create()
    {
        // Tampilkan formulir penambahan pengguna
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // Simpan pengguna ke dalam database
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $user->save();

        // Atur peran pengguna
        $role = Role::where('nama_role', $request->get('role'))->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect('/admin/users')->with('success', 'Pengguna baru telah ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data pengguna yang akan diubah
        $user = User::find($id);
        $roles = Role::all();

        // Tampilkan formulir pengeditan pengguna
        return view('dashboard.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input pengguna
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required',
        ]);

        // Simpan perubahan pada pengguna
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();

        // Atur ulang peran pengguna
        $user->roles()->sync([]);
        $role = Role::where('nama_role', $request->get('role'))->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect('/admin/users')->with('success', 'Pengguna telah diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus pengguna dari database
        $user = User::find($id);
        $user->roles()->sync([]); // Hapus relasi peran terlebih dahulu
        $user->delete();

        return redirect('/admin/users')->with('success', 'Pengguna telah dihapus.');
    }
}
