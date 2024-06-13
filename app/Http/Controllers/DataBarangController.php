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
            'jumlah' => 'required|integer|min:0'
        ]);

        Barang::create($validasiData);
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
        // dd($request);
        $validasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'nullable|integer|min:1',
            'operator' => 'nullable',
            'tujuan' => 'nullable'
        ]);

        // cari baris mana yang akan diupdate datanya
        $barangs = Barang::findOrFail($id);

        if($validasiData['operator'] == '-'){
            if($validasiData['tujuan'] == 'gas_terisi'){
                $barangs -> jumlah -= $validasiData['jumlah'];
                $barangs -> gas_terisi -= $validasiData['jumlah'];
            } elseif($validasiData['tujuan'] == 'gas_kosong')
        }


        // update data nya
        $barangs->nama = $request->input('nama');
        $barangs->harga = $request->input('harga');
        $barangs->jumlah = $request->input('jumlah');

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
