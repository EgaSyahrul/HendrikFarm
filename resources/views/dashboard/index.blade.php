<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart Controller</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #EDF0F7;
        }

        #wrapper {
            background-color: #EDF0F7;
        }

        .bg-dark {
            background-color: #2A303C !important;
        }

        .container-fluid {
            background-color: #EDF0F7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav-item {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-item:hover {
            background-color: #21252F;
        }

        .nav-bind:hover {
            background-color: #F6F6F6 !important;
        }

        .nav-item.active {
            background-color: #21252F;
        }

        .data-kum:hover {
            background-color: #F6F6F6;
        }

        .data-kum.active {
            background-color: #F6F6F6;
        }

        .nav-item a {
            text-decoration: none;
            color: #808080;
            transition: color 0.3s ease;
        }

        .device-actions {
            transition: all 0.3s ease;
        }

        .scrollable-table {
            max-height: 448px;
            overflow-y: auto;
        }

        .scrollable-table::-webkit-scrollbar {
            width: 8px;
        }

        .scrollable-table::-webkit-scrollbar-thumb {
            background-color: #555;
            border-radius: 4px;
        }

        .scrollable-table::-webkit-scrollbar-thumb:hover {
            background-color: #808080;
        }

        footer {
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-info p {
            margin: 5px 0;
        }

        .footer-social-media {
            margin-top: 10px;
        }

        .footer-link {
            text-decoration: none;
            color: #fff;
        }

        .footer-info a:hover {
            text-decoration: underline;
            color: #ddd;
        }

        .social-icon {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-size: 24px;
        }

        .social-icon:hover {
            color: #ddd;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @if (Auth::user()->role === 'admin')
            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-light accordion shadow" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                    style="background-color: #1263BE !important;" href="{{ route('dashboard.index') }}">
                    <div class="sidebar-brand-text mx-3 fw-bolder text-light fs-5" style="white-space: nowrap;">SMART
                        CONTROLLER</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- All Nav Item -->
                <li class="nav-item active">
                    <a class="nav-link " href="{{ route('dashboard.index') }}">
                        <i class="fas fa-fw fa-tachometer-alt" style="color: #ffffff"></i>
                        <span class=" text-light">Dashboard</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fas fa-users" style="color: #ffffff"></i>
                        <span class=" text-light">Users</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
        @endif

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                    @if (Auth::user()->role === 'user')
                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-flex align-items-center justify-content-center"
                            href="{{ route('dashboard.index') }}">
                            <div class="sidebar-brand-text mx-3 fw-bolder text-dark fs-5" style="white-space: nowrap;">
                                SMART
                                CONTROLLER</div>
                        </a>
                    @endif

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    {{-- <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto ">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item nav-bind dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-dark">{{ $user->nama }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/img/Screenshot 2025-04-24 151754.png') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="row">
                        {{-- Kolom Data dan Detail --}}
                        <div class="col-8">
                            {{-- Detail Perangkat (Hanya Ditampilkan Jika Perangkat Dipilih) --}}
                            @if ($selectedDevice)
                                <div class="row">
                                    <!-- Nama -->
                                    <div class="col-xl-6 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div
                                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Name
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $selectedDevice['nama'] }}
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-building fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-xl-6 col-md-6 mb-4">
                                        <div class="card border-left-dark shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div
                                                            class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                            Status
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $selectedDevice['status'] }}
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-signal fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Suhu -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-danger shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div
                                                            class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                            Temperature
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $selectedDevice['suhu'] }} °C
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kelembaban -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-info shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div
                                                            class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                            Humidity
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $selectedDevice['kelembaban'] }} %
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-tint fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Suhu Mesin -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card border-left-dark shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div
                                                            class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                            Temp Heater</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            {{ $selectedDevice['mesin'] }} °C
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-cogs fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Grafik Data --}}
                                <div class="card shadow mb-5">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <h6 class="m-0 font-weight-bold text-primary">Monitoring History</h6>
                                        <form method="GET" action="{{ route('dashboard.index') }}"
                                            class="d-flex align-items-center">
                                            <input type="hidden" name="device_id"
                                                value="{{ $selectedDevice['id'] }}">
                                            <div class="form-group mb-0 mr-2">
                                                <input type="date" id="tanggal" name="tanggal"
                                                    class="form-control form-control-sm"
                                                    value="{{ request('tanggal') }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <canvas id="allSuhuChart"></canvas>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="allKelembabanChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Kolom Tabel --}}
                        <div class="col-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Kumbung Anda</h6>

                                    @if (Auth::user()->role === 'admin')
                                        <!-- Dropdown Button -->
                                        <div class="dropdown no-arrow">
                                            <a class="btn btn-sm dropdown-toggle" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton">
                                                <button class="dropdown-item btn btn-sm btn-success"
                                                    data-toggle="modal" data-target="#addModal">
                                                    <i class="fas fa-plus"></i> Add
                                                </button>
                                                <button class="dropdown-item btn btn-sm" data-toggle="modal"
                                                    data-target="#searchModal">
                                                    <i class="fas fa-search"></i> Search
                                                </button>
                                                <button class="dropdown-item btn btn-sm toggle-mode"
                                                    data-mode="device-actions">
                                                    <i class="fas fa-random"></i> Mode: Actions
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive scrollable-table">
                                        <table class="table table-borderless" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <tbody>
                                                @forelse ($dataDevices as $device)
                                                    <tr class="data-kum" data-id="{{ $device['id'] }}"
                                                        data-mode="device-actions">
                                                        <td>
                                                            {{ $device['nama'] }}
                                                            <br><small>{{ $device['user_name'] }}</small>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            @if ($device['online'])
                                                                <small class="text-success">ONLINE</small>
                                                            @else
                                                                <small class="text-danger">OFFLINE</small>
                                                            @endif
                                                        </td>
                                                        {{-- <td class="text-center device-actions"
                                                                data-id="{{ $device['id'] }}">
                                                                <a href="{{ route('dashboard.index', ['device_id' => $device['id']]) }}"
                                                                    class="btn btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <button class="btn btn-sm btn-delete"
                                                                    style="display: none;" data-toggle="modal"
                                                                    data-target="#deleteModal{{ $device['id'] }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </td> --}}


                                                        <!-- Modal Delete -->
                                                        <div class="modal fade" id="deleteModal{{ $device['id'] }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                                            Konfirmasi Hapus</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus perangkat
                                                                        <strong>{{ $device['nama'] }}</strong>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <form
                                                                            action="{{ route('dashboard.destroy', $device['id']) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Hapus</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="3">Data tidak tersedia</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container">
                    {{-- <div class="footer-info">
                        <a href="https://maps.app.goo.gl/CnjuuzRcBsFAgWKv7" target="_blank" class="footer-link">
                            <p><strong>Alamat:</strong> Jl. Menuju Kenangan Indah No.3, Talangsari, Kabupaten Jember, Jawa Timur</p>
                        </a>
                        <a href="mailto:trushmebin@gmail.com?subject=Subjek%20Email&body=P,%20hallo%20isi%20egga"
                            target="_blank" class="footer-link">
                            <p><strong>Email:</strong> tRushMeBin@gmail.com</p>
                        </a>
                        <a href="https://wa.me/6282331879753?text=p,%20hallo%20egga" target="_blank"
                            class="footer-link">
                            <p><strong>Telepon:</strong> +62 823-3187-9753</p>
                        </a>
                    </div>
                    <div class="footer-social-media">
                        <a href="https://www.facebook.com/profile.php?id=100089054325920" target="_blank"
                            class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rushbinenterprise/" target="_blank" class="social-icon"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@egasyahrul4430/videos" target="_blank"
                            class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div> --}}
                    <div class="copyright text-center text-dark my-2">
                        <span>&copy; 2025 Rushbin Enterprise | Copyright All Rights Reserved</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Search Kumbung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.index') }}" method="GET">
                        <div class="form-group">
                            <label for="searchName">Nama Kumbung</label>
                            <input type="text" name="search" id="searchName" class="form-control"
                                placeholder="Masukkan nama kumbung">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Apakah kamu mau keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih "Logout" untuk keluar.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('dashboard.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Perangkat</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama perangkat" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="api">API Perangkat</label>
                            <input type="text" class="form-control" id="api" name="api"
                                placeholder="Masukkan api perangkat" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namau">Nama User</label>
                            <select class="form-control" id="namau" name="namau" required>
                                <option value="">Pilih Nama User</option>
                                @foreach ($akuns as $akun)
                                    <option value="{{ $akun->id }}">{{ $akun->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if ($allCharts)
        @if (Auth::user()->role === 'admin')
            <script>
                let currentMode = 'device-actions'; // default mode

                document.querySelector('.toggle-mode').addEventListener('click', function() {
                    currentMode = (currentMode === 'device-actions') ? 'delete' : 'device-actions';
                    this.dataset.mode = currentMode;
                    this.innerHTML =
                        `<i class="fas fa-random"></i> Mode: ${currentMode === 'delete' ? 'Delete' : 'Actions'}`;
                });

                // Handle tr click
                document.querySelectorAll('#dataTable tbody tr').forEach(function(row) {
                    row.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        if (!id) return; // skip if no device ID

                        if (currentMode === 'device-actions') {
                            window.location.href = `/dashboard?device_id=${id}`;
                        } else if (currentMode === 'delete') {
                            const modalId = `#deleteModal${id}`;
                            $(modalId).modal('show');
                        }
                    });
                });
            </script>
        @endif
        <script>
            const suhuData = @json($allCharts['suhu']);
            const kelembabanData = @json($allCharts['kelembaban']);
            const waktuData = @json($allCharts['waktu']);

            // Chart Suhu
            new Chart(document.getElementById('allSuhuChart'), {
                type: 'line',
                data: {
                    labels: waktuData,
                    datasets: [{
                        label: 'Temperature History (°C)',
                        data: @json($allCharts['suhu']),
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
            });

            // Chart Kelembaban
            new Chart(document.getElementById('allKelembabanChart'), {
                type: 'line',
                data: {
                    labels: waktuData,
                    datasets: [{
                        label: 'Humidity History (%)',
                        data: @json($allCharts['kelembaban']),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
            });
        </script>
    @endif


</body>

</html>
