<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = $request->input('query'); // Ambil kata kunci pencarian


        // Query semua data barang jika tidak ada kata kunci pencarian
    $barangs = Barang::when($query, function ($q) use ($query) {
        $q->where('nama', 'like', "%{$query}%");
    })->paginate(10);

        // $barangs = Barang::all();
        return view('DataBarang.index', [
            'barangs'=> $barangs,
            'query' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('DataBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'gas_terisi' => 'required|integer|min:0',
            'gas_kosong' => 'required|integer|min:0'
        ]);


        $barang = new Barang();
        $barang->nama = $validasiData['nama'];
        $barang->harga = $validasiData['harga'];
        $barang->gas_terisi = $validasiData['gas_terisi'];
        $barang->gas_kosong =$validasiData['gas_kosong'];
        $barang->jumlah = $validasiData['gas_kosong'] + $validasiData['gas_terisi'];
        $barang->save();
        return redirect()->route('databarang.index')->with('sukses', 'Data barang berhasil ditambahkan!');
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
        $barang = Barang::find($id);
        return view('DataBarang.edit')->with('barangs', $barang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'nullable|integer|min:1',
            'operator' => 'nullable',
            'tujuan' => 'nullable'
        ]);
        // dd($validasiData);

        // cari baris mana yang akan diupdate datanya
        $barangs = Barang::findOrFail($id);

        if($validasiData['jumlah'] != null){
            if($validasiData['operator'] == '-'){
                if($validasiData['tujuan'] == 'gas_terisi'){
                    $barangs -> jumlah -= $validasiData['jumlah'];
                    $barangs -> gas_terisi -= $validasiData['jumlah'];
                } elseif($validasiData['tujuan'] == 'gas_kosong'){
                    $barangs -> jumlah -= $validasiData['jumlah'];
                    $barangs -> gas_kosong -= $validasiData['jumlah'];
                }
            }elseif($validasiData['operator'] == '+'){
                if($validasiData['tujuan'] == 'gas_terisi'){
                    $barangs -> jumlah += $validasiData['jumlah'];
                    $barangs -> gas_terisi += $validasiData['jumlah'];
                } elseif($validasiData['tujuan'] == 'gas_kosong'){
                    $barangs -> jumlah += $validasiData['jumlah'];
                    $barangs -> gas_kosong += $validasiData['jumlah'];
                }
            }
        }
        $barangs->nama = $validasiData['nama'];
        $barangs->harga = $validasiData['harga'];
        $barangs->save();
        return redirect()->route('databarang.index')->with('sukses', 'Data barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1. mencari baris data
        $rowtodelete = Barang::findOrFail($id);

        // 2. hapus data
        $rowtodelete->delete();

        // 3. kembali ke index
        return redirect()->route('databarang.index')->with('sukses','Data berhasil dihapus!');

    }
}
