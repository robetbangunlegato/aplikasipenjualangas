<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='databarang.create'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data Barang"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <form action="{{ route('databarang.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" autofocus>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" min="0">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" min="0">
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


    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
