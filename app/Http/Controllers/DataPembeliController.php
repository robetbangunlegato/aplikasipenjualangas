<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pembelis = Pembeli::all();
        return view('DataPembeli.index')->with('pembelis', $pembelis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('DataPembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'nama' => 'required'
        ]);
        Pembeli::create($validasi);
        return redirect()->route('datapembeli.index')->with('sukses', 'Data pembeli berhasil ditambahkan!');
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
        $pembeli = Pembeli::find($id);
        return view('DataPembeli.edit')->with('pembeli', $pembeli);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validasi = $request->validate([
            'nama' => 'required'
        ]);

        $pembelis = Pembeli::findOrFail($id);
        $pembelis->nama = $validasi['nama'];
        $pembelis->save();
        return redirect()->route('datapembeli.index')->with('sukses', 'Data pembeli berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $rowtodelete = Pembeli::findOrFail($id);
        $rowtodelete->delete();
        return redirect()->route('datapembeli.index')->with('sukses', 'Data pembeli berhasil dihapus!');

    }
}
