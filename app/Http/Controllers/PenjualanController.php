<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangs = Barang::all();
        return view('Penjualan.index')->with('barangs', $barangs);
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
    public function store(Request $request)
    {
        //
        
        $validasi = $request->validate([
            'jumlah' => 'required',
            'pembeli_id' => 'required',
            'barang_id' => 'required',
            'user_id' => 'required'
        ]);

        $barang = Barang::findOrFail($validasi['barang_id']);
        $barang->gas_terisi -=$validasi['jumlah'];
        $barang->gas_kosong += $validasi['jumlah'];
        dd($validasi);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pembelis = Pembeli::all();
        $barang = Barang::find($id);
        return view('Penjualan.show')->with('barang', $barang)->with('pembelis', $pembelis);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
