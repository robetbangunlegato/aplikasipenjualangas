<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='laporan.index'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Laporan"></x-navbars.navs.auth>
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
            {{-- end alert --}}
            {{-- tambah barang button --}}
            <div class="row">
                <div class="col-2 offset-10 text-end">
                    <button class="btn btn-secondary" onclick="printLaporan()">Cetak
                        <i class="material-icons opacity-50">print</i></button>


                </div>
            </div>
            {{-- end tambah barang button --}}
            {{-- table --}}
            <div class="row" id="laporan">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID Pembeli
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Pembeli
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah pembelian
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Petugas
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID Petugas
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu transaksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $no = 1;
                                    @endphp

                                    @forelse ($transaksis as $transaksi)
                                        <tr>
                                            {{-- @dd($transaksi->pembeli) --}}
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $no }}</p>
                                                @php
                                                    $no++;
                                                @endphp
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">
                                                    {{ $transaksi->pembeli_id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">
                                                    {{ $transaksi->pembeli->nama }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $transaksi->jumlah }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $transaksi->user->name }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $transaksi->user_id }}</p>
                                            </td>

                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $transaksi->created_at }}
                                                </p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-xs font-weight-normal">
                                                Tidak ada data.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end table --}}

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
                    $('#FormulirHapus').attr('action', '/datapembeli/' + id);
                });

                $('#FormulirHapus').on('submit', function(event) {
                    // Tambahkan validasi di sini jika diperlukan
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const currentUrl = new URL(window.location.href);

                searchInput.addEventListener('input', function() {
                    currentUrl.searchParams.set('query', this.value);
                    history.pushState(null, null, currentUrl); // Update URL tanpa refresh

                    // Kirim permintaan AJAX untuk mendapatkan data baru
                    fetch(currentUrl)
                        .then(response => response.text())
                        .then(html => {
                            // Perbarui isi tabel dengan data baru
                            const newTable = new DOMParser().parseFromString(html, 'text/html')
                                .querySelector('.table');
                            document.querySelector('.table').replaceWith(newTable);
                        });
                });
            });

            function printLaporan() {
                // 1. Clone konten laporan
                var printContents = document.getElementById("laporan").cloneNode(true);

                // 2. Buat jendela pop-up baru
                var popupWin = window.open('', '_blank', 'width=1200,height=600');

                // 3. Atur konten pop-up
                popupWin.document.open();
                popupWin.document.write('<html><head><title>Laporan</title></head><body>' + printContents.innerHTML +
                    '</body></html>');
                popupWin.document.close();

                // 4. Cetak konten pop-up
                popupWin.print();
            }
        </script>
    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
