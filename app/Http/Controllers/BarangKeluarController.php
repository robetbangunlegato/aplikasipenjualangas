<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaksis = Transaksi::where('jenis_transaksi', 'keluar')->get();
        return view('BarangKeluar.index')->with('transaksis', $transaksis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('BarangKeluar.create')->with('barangs', $barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $barang_id = $request->barang_id;
    $barang = Barang::findOrFail($barang_id); // Ambil model Barang

    $stok_barang = $barang->jumlah; // Ambil stok barang dari model

    $validasiData = $request->validate([
        'barang_id' => 'required|string:max:255',
        'jenis_transaksi' => 'required',
        'jumlah' => 'required|integer|min:1|lte:'. $stok_barang 
    ]);

    if ($barang->jumlah < $validasiData['jumlah']) {
        return back()->withErrors(['jumlah' => 'Jumlah melebihi stok yang tersedia']);
    }

    $barang->jumlah -= $validasiData['jumlah']; // Update stok di model
    $barang->save(); // Simpan perubahan

    Transaksi::create($validasiData); 

    return redirect()->route('barangkeluar.index')->with('sukses', 'Transaksi berhasil dilakukan!');
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
