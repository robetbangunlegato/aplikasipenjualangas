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
                                value="{{ $barangs->nama }}" required>
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
                            <label for="" class="form-label">Jumlah saat ini</label>
                            <input type="number" class="form-control" value="{{ $barangs->jumlah }}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" min="1" id="jumlah">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <select name="operator" id="operator" class="form-select bg-white p-2" required disabled>
                            <option value="">pilih penambahan/pengurangan stok</option>
                            <option value="+">Penambahan</option>
                            <option value="-">Pengurangan</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="tujuan" id="tujuan" class="form-select bg-white p-2" required disabled>
                            <option value="">pilih tujuan penambahan/pengurangan</option>
                            <option value="gas_terisi">Gas terisi</option>
                            <option value="gas_kosong">Gas kosong</option>
                        </select>
                    </div>
                </div>
                <div class="row">
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
                const jumlahInput = document.getElementById('jumlah');
                const dropdown1 = document.getElementById('operator');
                const dropdown2 = document.getElementById('tujuan');

                jumlahInput.addEventListener('input', function() {
                    if (this.value > 0) {
                        dropdown1.disabled = false;
                        dropdown2.disabled = false;
                    } else {
                        dropdown1.disabled = true;
                        dropdown2.disabled = true;
                        // dropdown1.removeAttribute('required');
                        // dropdown2.removeAttribute('required');
                    }
                });

            });
        </script>
    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
