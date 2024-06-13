<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='datapembeli.index'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data Pembeli"></x-navbars.navs.auth>
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
                <div class="col-3">
                    <a href="{{ route('datapembeli.create') }}" class="btn btn-primary">Tambah Data Pembeli
                        <i class="material-icons opacity-50">playlist_add</i></a>
                </div>
            </div>
            {{-- end tambah barang button --}}
            {{-- tabel --}}
            <div class="row">
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
                                            ID
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Opsi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($pembelis as $pembeli)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $no }}</p>
                                                @php
                                                    $no++;
                                                @endphp
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $pembeli->id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-normal mb-0">{{ $pembeli->nama }}</p>
                                            </td>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('datapembeli.edit', $pembeli->id) }}"
                                                    class="btn btn-warning">Edit
                                                    <i class="material-icons opacity-50">draw</i></a>


                                                <button class="btn btn-danger btn-hapus"
                                                    data-id-barang="{{ $pembeli->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#HapusModal">Hapus
                                                    <i class="material-icons opacity-50">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-xs font-weight-normal">
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
            {{-- end tabel --}}

            {{-- modal --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="modal fade" id="HapusModal" tabindex="-1" role="dialog"
                        aria-labelledby="modal-notification" aria-hidden="true">
                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                                <form action="" method="POST" id="FormulirHapus">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="py-3 text-center">
                                            <i class="material-icons text-secondary" style="font-size: 100px;">
                                                report
                                            </i>
                                            <h4
                                                class="text-gradient
                                                text-danger mt-4">
                                                Peringatan!</h4>
                                            <p>Apakah anda yakin ingin menghapus item ini?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                            type="submit">Hapus
                                        </button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}

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
        </script>
    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
