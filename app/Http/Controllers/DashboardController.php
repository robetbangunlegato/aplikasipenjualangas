<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //data untuk diagram batang
        $barangs = Barang::select('nama', 'jumlah')->get();
        $sumbu_x_diagram_batang = $barangs->pluck('nama');
        $sumbu_y_diagram_batang = $barangs->pluck('jumlah');
        $waktu_terbaru_baris_data_tabel_barangs_diupdate = Barang::latest('updated_at')->value('updated_at');
        // akhir coding data untuk diagram batang

        // data untuk jumlah pengguna
        $jumlah_pengguna = User::count();

        // data hasil penjualan
        $total_penjualan = number_format($total_penjualan = Transaksi::with('barang')
        ->get()
        ->sum(function ($transaksi) {
            return $transaksi->jumlah * $transaksi->barang->harga;
        }), 0, ',', '.');

        // data jumlah produk
        $jumlah_produk = Barang::all()->count();

        // data untuk jumlah barang
        $jumlah_barang = Barang::sum('jumlah');
        return view('dashboard.index', [
            'jumlah_barang' => $jumlah_barang,
            'sumbu_x_diagram_batang' => $sumbu_x_diagram_batang,
            'sumbu_y_diagram_batang' => $sumbu_y_diagram_batang,
            'waktu_terbaru_baris_data_tabel_barangs_diupdate' => $waktu_terbaru_baris_data_tabel_barangs_diupdate,
            'jumlah_pengguna' => $jumlah_pengguna,
            'total_penjualan' => $total_penjualan,
            'jumlah_produk' => $jumlah_produk
        ]);
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
