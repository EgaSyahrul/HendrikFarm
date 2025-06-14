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
            font-family: "Times New Roman", Times, serif;
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
            background-color: #EDF0F7;
        }

        .nav-item a {
            text-decoration: none;
            color: #808080;
            transition: color 0.3s ease;
        }

        .hero-section {
            position: relative;
            background-image: url('/assets/img/Gambar WhatsApp 2025-06-14 pukul 12.35.33_f2d44f73.jpg');
            /* filter: grayscale(60%); */
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(255, 255, 255, 0.6); */
            z-index: 1;
        }

        .hero-text {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.8);
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: bold;
            /* color: #fff; */
        }

        .hero-text h5 {
            font-weight: bold;
            /* color: #fff; */
        }

        .featurette {
            color: #001659;
            margin-bottom: 2rem;
            padding: 1rem 0;
        }

        .featurette-heading {
            /* font-size: 1.5rem; */
            /* color: #001659; */
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .featurette .lead {
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 0;
        }

        .featurette img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .featurette-divider {
            margin: 1rem 0;
            border-top: 1px solid #e0e0e0;
        }

        .creator-section {
            background-color: rgba(0, 0, 255, 0.1);
            padding: 30px 15px;
            text-align: center;
        }

        .creator-section h3 {
            color: #2A303C;
            font-weight: bold;
        }

        .creator-link:hover {
            text-decoration: underline;
            color: #1263BE;
        }

        .creator-link {
            color: #2A303C;
            text-decoration: none;
        }

        footer {
            color: #2A303C;
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
            color: #2A303C;
        }

        .footer-info a:hover {
            text-decoration: underline;
            color: #1263BE;
        }

        .social-icon {
            color: #2A303C;
            margin: 0 10px;
            text-decoration: none;
            font-size: 24px;
        }

        .social-icon:hover {
            text-decoration: underline;
            color: #1263BE;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark topbar static-top shadow">
                    <!-- Brand di sisi kiri -->
                    <a class="navbar-brand d-flex align-items-center justify-content-center"
                        href="{{ route('dashboard.index') }}">
                        <div class="sidebar-brand-text mx-3 fw-bolder text-light fs-5" style="white-space: nowrap;">
                            SMART
                            CONTROLLER</div>
                    </a>

                    <!-- Navbar kanan -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        @if (Auth::user())
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline small text-light">{{ $user->nama }}</span>
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
                                    @if (Auth::user())
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    @endif

                                </div>
                            </li>
                        @else
                            <!-- Tombol untuk memicu modal -->
                            <a class="mr-2 mt-2 text-light" href="{{ route('login.index') }}">
                                <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Login
                            </a>
                        @endif
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->


                <!-- Hero Section -->
                <div class="hero-section">
                    <div class="hero-overlay"></div>
                    <div class="hero-text">
                        <h1 style="text-transform: uppercase;">SMART CONTROLLER</h1>
                        <h5>adalah aplikasi sistem informasi berbasis website untuk memonitoring kondisi udara kumbung
                            dalam budidaya jamur merang</h5>
                    </div>
                </div>

                <!-- Cards Section -->
                <div class="container py-5">
                    <hr class="featurette-divider">

                    <!-- Jamur Merang -->
                    <div class="row featurette align-items-center mb-5">
                        <div class="col-md-7 order-md-2">
                            <h2 class="featurette-heading">Jamur merang (Volvariella volvacea)</h2>
                            <p class="lead">
                                adalah jenis jamur pangan tropis yang populer di Asia Tenggara, termasuk Indonesia.
                                Jamur ini dikenal
                                memiliki rasa yang enak, tekstur lembut, dan nilai gizi yang tinggi.
                            </p>
                            <ul>
                                <li><strong>Warna:</strong> Putih dan abu-abu muda hingga cokelat keabu-abuan.</li>
                                <li><strong>Bentuk:</strong> Bulat telur saat muda (stadium kancing), lalu membuka
                                    seperti payung saat tua.</li>
                            </ul>
                            <p class="lead"><strong>Manfaat jamur merang:</strong></p>
                            <ul>
                                <li>Sumber protein nabati.</li>
                                <li>Mengandung vitamin (terutama B kompleks), mineral, dan serat.</li>
                                <li>Rendah lemak dan kalori, cocok untuk diet sehat.</li>
                                <li>Digunakan dalam berbagai masakan seperti tumis, sop, dan sate jamur.</li>
                            </ul>
                        </div>
                        <div class="col-md-5 order-md-1">
                            <img src="{{ asset('assets/img/jamur.png') }}" class="img-fluid rounded shadow-sm"
                                alt="Jamur Merang">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <!-- Kumbung -->
                    <div class="row featurette align-items-center mb-5">
                        <div class="col-md-7">
                            <h2 class="featurette-heading">Kumbung</h2>
                            <p class="lead">
                                adalah bangunan atau ruangan khusus yang digunakan untuk membudidayakan jamur, termasuk
                                jamur merang. Fungsi utama kumbung adalah menciptakan lingkungan ideal bagi pertumbuhan
                                jamur.
                            </p>
                            <ul>
                                <li><strong>Bahan:</strong> Terbuat dari bambu, kayu, atau batako.</li>
                                <li><strong>Atap:</strong> Menggunakan genteng, rumbia, atau plastik UV.</li>
                                <li><strong>Ventilasi:</strong> Memiliki ventilasi udara yang cukup untuk menjaga
                                    sirkulasi.</li>
                                <li><strong>Lantai:</strong> Biasanya dari tanah atau semen, yang dapat disiram untuk
                                    menjaga kelembapan.</li>
                            </ul>
                            <p class="lead"><strong>Fungsi kumbung:</strong></p>
                            <ul>
                                <li>Menjaga suhu optimal.</li>
                                <li>Menjaga kelembapan udara.</li>
                                <li>Melindungi jamur dari sinar matahari langsung, angin, dan hujan.</li>
                                <li>Tempat menyusun media tanam dan menanam bibit jamur.</li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <img src="{{ asset('assets/img/Skripsi/Foto Kumbung dll/IMG_20250604_164733.jpg') }}"
                                class="img-fluid rounded shadow-sm" alt="Kumbung">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <!-- Media Tanam -->
                    <div class="row featurette align-items-center mb-5">
                        <div class="col-md-7 order-md-2">
                            <h2 class="featurette-heading">Media tanam (substrat)</h2>
                            <p class="lead">
                                adalah bahan tempat tumbuhnya miselium jamur. Jamur merang memerlukan media yang kaya
                                selulosa dan mudah terurai. Media tanam yang baik akan mendukung pertumbuhan dan
                                produksi jamur secara optimal.
                            </p>
                            <p class="lead"><strong>Jenis-jenis media tanam:</strong></p>
                            <ul>
                                <li>Jerami padi (paling umum): murah, mudah diperoleh, kaya selulosa.</li>
                                <li>Limbah kapas: kaya serat, sering dicampur dengan bahan lain.</li>
                                <li>Tongkol jagung cincang: alternatif dengan kandungan organik tinggi.</li>
                                <li>Tandan kosong kelapa sawit (TKKS): sering digunakan di daerah perkebunan sawit.</li>
                                <li>Serbuk gergaji: jarang digunakan karena aerasi buruk.</li>
                            </ul>
                            <p class="lead"><strong>Bahan tambahan:</strong></p>
                            <ul>
                                <li>Dedak padi (bekatul): sumber nutrisi tambahan (nitrogen).</li>
                                <li>Kapur (CaCO₃/dolomit): menyeimbangkan pH media tanam.</li>
                                <li>Air: menjaga kelembapan media.</li>
                            </ul>
                        </div>
                        <div class="col-md-5 order-md-1">
                            <img src="{{ asset('assets/img/Skripsi/Foto Kumbung dll/1000395723.jpg') }}"
                                class="img-fluid rounded shadow-sm" alt="Media Tanam">
                        </div>
                    </div>

                    <hr class="featurette-divider">
                </div>

                <!-- Creator Section -->
                <div class="creator-section text-center py-4 mb-5">
                    <h3>Dibuat oleh Ega Syahrul Ramadhanto</h3>
                    <img class="img-profile rounded-circle py-2"
                        src="{{ asset('assets/img/Gambar WhatsApp 2025-06-09 pukul 11.43.55_98dedb46.jpg') }}"
                        alt="creator-img" style="height: 200px">
                    <p>
                        Halo, saya Ega Syahrul Ramadhanto. Seorang web developer dan mahasiswa yang antusias
                        dalam teknologi serta desain web.
                        <br>
                        Kunjungi portofolio saya di <a class="creator-link" href="https://egasyahrul.github.io/"
                            target="_blank" rel="noopener noreferrer">egasyahrul.github.io</a>
                        untuk melihat proyek saya yang lain.
                    </p>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container">
                    <div class="footer-info">
                        <a href="https://maps.app.goo.gl/CnjuuzRcBsFAgWKv7" target="_blank" class="footer-link">
                            <p><strong>Alamat:</strong> Jl. Menuju Kenangan Indah No.3, Talangsari, Kabupaten Jember,
                                Jawa Timur</p>
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
                    </div>
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
    @if (request('loginRequired'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alert('{{ request('message') }}');
                // Logika untuk membuka modal login
                $('#loginModal').modal('show');
            });
        </script>
    @endif
    {{-- @if (session('openLoginModal'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Menampilkan pesan error (jika ada)
                @if ($errors->has('loginError'))
                    alert('{{ $errors->first('loginError') }}');
                @endif

                // Logika untuk membuka modal login
                $('#loginModal').modal('show');
            });
        </script>
    @endif --}}




</body>

</html>
