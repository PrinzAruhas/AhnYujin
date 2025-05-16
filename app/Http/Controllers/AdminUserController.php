<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::get(),
            'title' => 'Manajemen User',
            'content' => 'admin.user.index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        $data = [
            'content' => 'admin.user.create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            're_password' => 'required|same:password',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi foto
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('user', 'public');
            $data['foto'] = $fotoPath;
        }

        User::create($data);
        return redirect('/admin/user')->with('success', 'Data Telah ditambahkan!!');
    }

    public function edit(string $id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'content' => 'admin.user.create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
            're_password' => 'same:password',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika password diisi, hash, kalau tidak gunakan password lama
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            // Jangan update password kalau kosong, hapus dari data supaya tidak overwrite
            unset($data['password']);
        }

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('user', 'public');
            $data['foto'] = $fotoPath;
        }

        $user->update($data);

        return redirect('/admin/user')->with('success', 'Data Telah diedit!!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Hapus foto jika ada
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();
        return redirect('/admin/user')->with('success', 'Data Telah dihapus!!');
    }
}
