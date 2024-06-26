@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="#">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Penjualan Gas</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Laravel examples
                </h6>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-primary' : '' }} "
                    href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                    href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li> --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($activePage, 'dashboard.') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-50">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($activePage, 'barangmasuk.') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('barangmasuk.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-50">move_to_inbox</i>
                    </div>
                    <span class="nav-link-text ms-1">Barang Masuk</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($activePage, 'barangkeluar.') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('barangkeluar.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-50">outbox</i>
                    </div>
                    <span class="nav-link-text ms-1">Barang Keluar</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith($activePage, 'databarang.') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('databarang.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-50">list_alt</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Barang</span>
                </a>
            </li>
            @if (Auth::user()->role == 'non-admin')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Str::startsWith($activePage, 'pembelian.') ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('pembelian.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">shopping_cart</i>
                        </div>
                        <span class="nav-link-text ms-1">Penjualan</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Str::startsWith($activePage, 'datapembeli.') ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('datapembeli.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Pembeli</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'manajer')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Str::startsWith($activePage, 'laporan.') ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('laporan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">summarize</i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
            @endif

            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li> --}}
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Str::startsWith($activePage, 'kelolapengguna.') ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('kelolapengguna.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">manage_accounts</i>
                        </div>
                        <span class="nav-link-text ms-1">Kelola Pengguna</span>
                    </a>
                </li>
            @endif
            {{-- <li class="nav-item">
                <a class="nav-link text-white " href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>
    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100"
                href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank">Free Download</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="../../documentation/getting-started/installation.html"
                target="_blank">View documentation</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro-laravel" target="_blank"
                type="button">Upgrade
                to pro</a>
        </div>
    </div> --}}
</aside>
