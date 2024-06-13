<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='pembelian.show'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Pembelian"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <style>
            .input {
                padding: 10px;
                width: 120px;
                border: none;
                outline: none;
                border-radius: 5px;
                box-shadow: 0px 4px 8px gray;
                font-size: 18px;
                transition: width 0.3s;
                font-family: Consolas, monaco, monospace;
                text-align: center
            }

            .input:focus {
                outline: 1px solid black;
                box-shadow: 0px 4px 8px gray;
                width: 230px;
            }

            .input::placeholder {
                color: gainsboro;
            }
        </style>

        {{-- body --}}
        <div class="container-fluid py-4">
            <div class="row text-center">
                <div class="col-lg-4">
                    <form action="{{ route('pembelian.store') }}" method="POST">
                        @csrf
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $barang->nama }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tersedia <span
                                        class="text-danger">{{ $barang->jumlah }}</span> barang</h6>
                                <p class="card-text">Harga satuan {{ $barang->harga }}</p>
                                <input placeholder="Jumlah..." class="input" name="jumlah_pesanan" type="number"
                                    id="jumlah_pesanan" max="{{ $barang->jumlah }}" min="1" autofocus>
                                <div class="form-group">
                                    <label for="barang">Pilih Barang:</label>
                                    <select class="form-control select2" id="barang" name="barang">
                                        <option value="">Pilih barang</option>
                                        @foreach ($pembelis as $id => $nama)
                                            <option value="{{ $id }}">{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="number" value="{{ $barang->id }}" name="barang_id" id=""
                                    hidden>
                                <button class="btn btn-primary mt-3" type="submit">Buat pesanan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end body --}}


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
