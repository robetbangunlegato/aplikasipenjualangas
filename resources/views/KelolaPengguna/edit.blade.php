<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='kelolapengguna.edit'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Kelola Pengguna"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <form action="{{ route('kelolapengguna.update', [$user->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row my-3">
                    <div class="col-6">
                        <div class="input-group input-group-outline is-filled">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" autofocus required
                                value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline is-filled">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required
                                value="{{ $user->email }}">
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
                        <div class="input-group input-group-outline is-filled">
                            <select name="role" id="pembeli" class="form-control" required>
                                <option value="">Pilih Role</option>
                                <option value="non-admin" @if ($user->role == 'non-admin') selected @endif>Pembeli
                                </option>
                                <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                                <option value="manajer" @if ($user->role == 'manajer') selected @endif>Manajer
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Password baru</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6 offset-3">
                        <button class="btn btn-primary col-12" type="submit">Simpan
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
