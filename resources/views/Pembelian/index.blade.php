<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='pembelian.index'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Pembelian"></x-navbars.navs.auth>
        <!-- End Navbar -->

        {{-- body --}}
        <div class="container-fluid py-4">
            <div class="row text-center">
                @foreach ($barangs as $barang)
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $barang->nama }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tersedia {{ $barang->jumlah }} barang</h6>
                                <p class="card-text">Harga satuan {{ $barang->harga }}</p>
                                <a href="{{ route('pembelian.show', $barang->id) }}" class="btn btn-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        {{-- end body --}}


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Tunggu 3 detik, lalu sembunyikan alert dengan efek fade
                $("#myAlert").delay(3000).fadeOut("slow");

                // mencari class button dengan nama 'btn-hapus dan menambahkan fungsi ketika tombol tersebut di klik'
                $('.btn-hapus').click(function() {
                    let id = $(this).data('id-barang');
                    $('#FormulirHapus').attr('action', '/databarang/' + id);
                });

                $('#FormulirHapus').on('submit', function(event) {
                    // Tambahkan validasi di sini jika diperlukan
                });
            });
        </script>
    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
