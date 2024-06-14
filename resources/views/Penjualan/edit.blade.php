<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='pembelian.create'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Penjualan"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <form action="{{ route('pembelian.update', [$barangs->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3 is-filled">
                            <label for="" class="form-label">Jumlah item {{ $barangs->nama }} yang
                                kosong</label>
                            <input type="number" class="form-control" value="{{ $barangs->gas_kosong }}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="" class="form-label">Jumlah gas yang dapat ditambahkan
                                {{ $barangs->gas_kosong }} unit</label>
                            <input type="number" class="form-control" name="jumlah" min="1"
                                max="{{ $barangs->gas_kosong }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        <button class="btn btn-primary my-3 col-12" type="submit">Simpan
                            <i class="material-icons">save</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
