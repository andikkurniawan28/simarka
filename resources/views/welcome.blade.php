<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <title>Sistem Informasi Manajemen Risiko Kebon Agung (SIMARKA)</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    @include('style')
</head>
<body>
    <!-- Navigasi Atas -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Informasi Manajemen Risiko Kebon Agung (SIMARKA)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> --}}
                </ul>
                <button class="btn btn-outline-light" onclick="logout()">Logout</button>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Navigasi Kiri -->
            <nav class="col-md-2 sidebar py-3">
                <h5>Sasaran Mutu</h5>
                <ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Korporat</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Divisi</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Unit</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Bagian</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Seksi</a></li>
                </ul>
                <h5 class="mt-4">Pencapaian Sasaran Mutu</h5>
                <ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Rencana Pencapaian</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Jadwal Monitoring</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Monitoring</a></li>
                </ul>
                <h5 class="mt-4">Pelaporan dan Catatan</h5>
                <ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Register Sasaran Mutu</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Profil Sasaran Mutu</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Pemantauan & Review</a></li>
                </ul>
                <h5 class="mt-4">Setup Awal</h5>
                <ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Bagian</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Jabatan</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">User / Pengguna</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Master Dampak</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Master Probabilitas</a></li>
                </ul>
            </nav>

            <!-- Konten Tengah -->
            <main class="col-md-8 py-3 text-center">
                {{-- <h1>Risk Management</h1> --}}
                {{-- <img src="{{ url('/') }}/img/home_image.jpg" alt="Risk Management Cycle" class="img-fluid my-3"> --}}
            </main>

            <!-- Navigasi Kanan -->
            <nav class="col-md-2 sidebar py-3">
                <h5>Proses Manajemen Risiko</h5>
                <ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Komunikasi dan Konsultasi</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Lingkup, Konteks, Kriteria</a></li>
                    <ul>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Lingkup & Konteks</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Kriteria Dampak</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Kriteria Probabilitas</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Efektivitas Kendali</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Kriteria Risiko</a></li>
                    </ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Penilaian Risiko</a></li>
                    <ul>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Identifikasi Risiko</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Analisa Risiko</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Evaluasi Risiko</a></li>
                    </ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Perlakuan Risiko</a></li>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Pemantauan dan Review</a></li>
                    <ul>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Risiko Teregistrasi</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Near Miss</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Insiden</a></li>
                    </ul>
                    <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Pencatatan & Pelaporan</a></li>
                    <ul>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Daftar Register Risiko</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Profil Risiko</a></li>
                        <li><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#modalXL">Pemantauan & Review</a></li>
                    </ul>
                </ul>
            </nav>

        </div>
    </div>

    <!-- Footer -->
    {{-- <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">© 2025 Risk Management - All Rights Reserved</p>
    </footer> --}}

    <!-- Modal XL -->
    <div class="modal fade" id="modalXL" tabindex="-1" aria-labelledby="modalXLLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalXLLabel">Detail Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Konten modal akan ditampilkan di sini.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        function logout() {
            // Menampilkan SweetAlert untuk konfirmasi logout
            Swal.fire({
                title: 'Logout Berhasil!',
                text: 'Anda telah keluar dari sistem.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>
</html>
