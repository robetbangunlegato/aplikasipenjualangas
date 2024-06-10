<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='databarang.index'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data Barang"></x-navbars.navs.auth>
        <!-- End Navbar -->

        {{-- body --}}
        <div class="container-fluid py-4">
            <form action="{{ route('databarang.update', $barangs->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3 is-filled">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" autofocus
                                value="{{ $barangs->nama }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3 is-filled">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" min="0"
                                value="{{ $barangs->harga }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3 is-filled">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" min="0"
                                value="{{ $barangs->jumlah }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary my-3 col-12" type="submit">Simpan
                            <i class="material-icons">save</i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        {{-- end body --}}



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
