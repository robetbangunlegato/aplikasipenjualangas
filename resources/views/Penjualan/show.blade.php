<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='pembelian.show'>
    </x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Pembelian">
        </x-navbars.navs.auth>
        <!-- End Navbar -->

        <body>
            <style>
                .input {
                    padding: 10px;
                    width: 120px;
                    border: none;
                    outline: none;
                    border-radius: 5px;
                    box-shadow: 0px 4px 8px gray;
                    font-size: 15px;
                    transition: width 0.3s;
                    /* font-family: Consolas, monaco, monospace; */
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
                                            class="text-danger">{{ $barang->gas_terisi }}</span> barang</h6>
                                    <p class="card-text">Harga satuan {{ $barang->harga }}</p>
                                    <input placeholder="Jumlah..." class="input mb-4" name="jumlah" type="number"
                                        id="jumlah" max="{{ $barang->gas_terisi }}" min="1" autofocus
                                        required>
                                    <input type="number" value="{{ $barang->id }}" name="barang_id" id=""
                                        hidden>
                                    <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                    <select name="pembeli_id" id="pembeli" class="form-select form-control select2"
                                        required>
                                        <option value="">Pilih Pembeli</option>
                                        @foreach ($pembelis as $pembeli)
                                            <option value="{{ $pembeli->id }}">{{ $pembeli->nama }} | ID :
                                                {{ $pembeli->id }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary mt-3" type="submit">Buat pesanan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        {{-- end body --}}

        <script>
            $(document).ready(function() {
                $('#pembeli').select2({
                    placeholder: 'Pilih Pembeli', // Placeholder opsional
                    allowClear: true // Tombol untuk menghapus pilihan
                });
            });
        </script>

    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
