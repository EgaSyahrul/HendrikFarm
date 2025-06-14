<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        // Ambil semua user dan hitung jumlah kumbung dari tabel overview
        $users = User::withCount(['kumbung'])->get();

        // Tambahkan nilai "-" untuk kumbung kosong
        $users->each(function ($user) {
            if ($user->kumbung_count === 0) {
                $user->kumbung_count = '-';
            }
        });

        return view('users.index', compact('user', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:account',
            'password' => 'required|min:6',
            'alamat' => 'nullable|string',
            'role' => 'required|string'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:account,email,' . $user->id,
            'alamat' => 'nullable|string',
            'role' => 'required|string'
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'role' => $request->role
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus semua data overview terkait
        Overview::where('user_id', $id)->delete();

        // Hapus user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Akun dan semua data kumbung berhasil dihapus.');
    }
}
