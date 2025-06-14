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
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('dashboard.index') }}">
                        <i class="fas fa-fw fa-tachometer-alt" style="color: #ffffff"></i>
                        <span class=" text-light">Dashboard</span></a>
                </li>

                <li class="nav-item  active">
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

                    <!-- Registered tool -->
                    <div class="card shadow mb-5">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary d-flex align-items-center">Tabel Pengguna</h6>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#createUserModal">
                                <i class="fas fa-plus"></i> Tambah User
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive scrollable-table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>Role</th>
                                            <th>Jumlah Kumbung</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $index => $user)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->alamat }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td class="text-center">{{ $user->kumbung_count }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editUserModal"
                                                        data-user='@json($user)'>
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Menghapus akun ini akan menghapus semua data kumbung yang terkait. Yakin ingin melanjutkan?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="7">Data tidak tersedia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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

    <!-- Modal Tambah User -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog"
        aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="editNama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" name="email" id="editEmail" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="editAlamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="editRole" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
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
    <script>
        $('#editUserModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const user = button.data('user');
            const modal = $(this);

            if (user) {
                modal.find('#editNama').val(user.nama || '');
                modal.find('#editEmail').val(user.email || '');
                modal.find('#editAlamat').val(user.alamat || '');
                modal.find('#editRole').val(user.role || '');
                modal.find('#editUserForm').attr('action', `/users/${user.id}`);
            } else {
                console.error("No user data available");
            }
        });
    </script>

</body>

</html>
