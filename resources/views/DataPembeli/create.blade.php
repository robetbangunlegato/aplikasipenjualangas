<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='datapembeli.create'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data Pembeli"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <form action="{{ route('datapembeli.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
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
