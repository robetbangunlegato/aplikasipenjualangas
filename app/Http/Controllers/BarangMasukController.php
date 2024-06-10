<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaksis = Transaksi::where('jenis_transaksi', 'masuk')->get();
        return view('BarangMasuk.index')->with('transaksis', $transaksis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('BarangMasuk.create')->with('barangs', $barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // membuat data transaksi
        $validasiData = $request->validate([
            'barang_id' => 'required|string|max:255',
            'jenis_transaksi' => 'required',
            'jumlah' => 'required|integer|min:1',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        Transaksi::create($validasiData);

        // meng-update jumlah barang pada tabel barang
        $barangs = Barang::findOrFail($validasiData['barang_id']);
        $barangs->jumlah += $validasiData['jumlah'];

        $barangs->update();
        return redirect()->route('barangmasuk.index')->with('sukses', 'Transaksi berhasil dilakukan!');
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
