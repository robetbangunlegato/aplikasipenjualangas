<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='pembelian.index'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Pembelian"></x-navbars.navs.auth>
        <!-- End Navbar -->
        {{-- body --}}
        <div class="container-fluid py-4">
            {{-- alert --}}
            @if (session()->has('sukses'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary text-white" role="alert" id="myAlert">
                            <strong>Berhasil! </strong>{{ session()->get('sukses') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row text-center">
                @forelse ($barangs as $barang)
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <div class="row text-end">
                                    <div class="dropdown float-lg-end pe-4 text-end" style="position: relative;">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5 dropdown-menu-end"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md"
                                                    href="{{ route('pembelian.edit', [$barang->id]) }}">Tambahkan
                                                    gas terisi</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <h5 class="card-title">{{ $barang->nama }}</h5>
                                <h6 class="card-subtitle mb-2 text-success">Tersedia
                                    {{ $barang->gas_terisi }} unit</h6>
                                @if ($barang->gas_kosong > 0)
                                    <h6 class="card-subtitle mb-2 text-warning">Kosong
                                        {{ $barang->gas_kosong }} unit</h6>
                                @endif

                                <p class="card-text">Harga satuan {{ $barang->harga }}</p>
                                @if ($barang->gas_terisi === 0)
                                    <button class="btn btn-secondary text-white" disabled>Buat pesanan</button>
                                @else
                                    <a href="{{ route('pembelian.show', $barang->id) }}" class="btn btn-primary">Buat
                                        pesan</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">tidak ada data.</h5>
                                <h6 class="card-subtitle mb-2 text-muted">tidak ada data.</h6>
                                <p class="card-text">tidak ada data.</p>
                                <button class="btn btn-secondary text-white" disabled>tidak ada data.</button>
                            </div>
                        </div>
                    </div>
                @endforelse


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
