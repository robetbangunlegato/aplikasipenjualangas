<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class KelolaPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('KelolaPengguna.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('KelolaPengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'nullable'
        ]);

        $user = new User();
        $user->name = $validasi['name'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->role = $validasi['role'];
        $user->save();
        return redirect()->route('kelolapengguna.index')->with('sukses', 'Data pengguna ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('KelolaPengguna.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $validasi['name'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->role = $validasi['role'];
        $user->save();
        return redirect()->route('kelolapengguna.index')->with('sukses', 'Data pengguna berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1.cari baris data
        $rowtodelete = User::findOrFail($id);

        // 2. hapus data
        $rowtodelete->delete();

        // kembali ke halaman index
        return redirect()->route('kelolapengguna.index')->with('sukses', 'Data berhasil dihapus');
    }
}
