<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPWA - Pengurus</title>

    <!-- Sneat Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/boxicons/css/boxicons.min.css') }}">
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- SIDEBAR -->
            <aside id="layout-menu" class="layout-menu menu-vertical bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('pengurus.dashboard') }}" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder">WPWA</span>
                    </a>
                </div>
                <ul class="menu-inner py-1">
                    <li class="menu-item {{ request()->routeIs('pengurus.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('pengurus.dashboard') }}" class="menu-link">
                            <i class="menu-icon bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pengurus.kegiatan.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-calendar"></i>
                            <div>Kegiatan</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pengurus.kehadiran.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-check-square"></i>
                            <div>Kehadiran</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pengurus.iuran.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-wallet"></i>
                            <div>Iuran</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pengurus.anggota.index') }}" class="menu-link">
                            <i class="menu-icon bx bx-group"></i>
                            <div>Anggota</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / SIDEBAR -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- NAVBAR -->
                <nav class="layout-navbar navbar navbar-expand-xl navbar-detached bg-navbar-theme" id="layout-navbar">
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">Pengurus</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / NAVBAR -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>

    <!-- Sneat Template JS -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>
</html>

