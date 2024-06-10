<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='barangmasuk.create'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Barang Masuk"></x-navbars.navs.auth>
        <!-- End Navbar -->

        {{-- body --}}
        <div class="container-fluid py-4">
            <form action="{{ route('barangmasuk.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <select name="barang_id" class="dropdown btn btn-outline-primary col-12" autofocus>
                            <option value="" class="dropdown-menu" selected>pilih barang..
                            </option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" class="dropdown-menu">{{ $barang->nama }}
                                    |
                                    jumlah tersedia : {{ $barang->jumlah }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('barangs_id'))
                            <div class="alert alert-danger py-0 mt-0 text-white">{{ $errors->first('barangs_id') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline is-filled">
                            <label for="" class="form-label">Jenis Transaksi</label>
                            <input type="text" class="form-control" disabled value="Masuk">
                            <input type="text" name="jenis_transaksi" hidden value="Masuk">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline">
                            <label for="" class="form-label">Jumlah barang masuk</label>
                            <input type="number" name="jumlah" class="form-control" min="1">
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary col-12" type="submit">Simpan <i
                                class="material-icons">save</i></button>
                    </div>
                </div>
            </form>
        </div>
        {{-- end body --}}
        <script></script>
    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
