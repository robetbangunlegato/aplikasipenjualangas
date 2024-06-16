<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='kelolapengguna.create'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Kelola Pengguna"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <form action="{{ route('kelolapengguna.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" autofocus required
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="row">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class="input-group input-group-outline">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline">
                            <select name="role" id="pembeli" class="form-control" required>
                                <option value="">Pilih Role</option>
                                <option value="non-admin">Pembeli</option>
                                <option value="admin">Admin</option>
                                <option value="manajer">Manajer</option>
                            </select>
                        </div>
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


    </main>
    <x-plugins></x-plugins>
    </div>
</x-layout>
