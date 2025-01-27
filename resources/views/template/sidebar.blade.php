<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shield-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIMARKA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Proses Manajamen Risiko
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-comments"></i>
            <span>Komunikasi & Konsultasi</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lingkupKonteksKriteria"
            aria-expanded="true" aria-controls="lingkupKonteksKriteria">
            <i class="fas fa-fw fa-sitemap"></i>
            <span style="font-size:12px;">Lingkup, Konteks, Kriteria</span>
        </a>
        <div id="lingkupKonteksKriteria" class="collapse" aria-labelledby="headinglingkupKonteksKriteria" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Lingkup & Konteks</a>
                <a class="collapse-item" href="">Kriteria Dampak</a>
                <a class="collapse-item" href="">Kriteria Probabilitas</a>
                <a class="collapse-item" href="">Efektivitas Kendali</a>
                <a class="collapse-item" href="">Kriteria Risiko</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penilaianRisiko"
            aria-expanded="true" aria-controls="penilaianRisiko">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
            <span>Penilaian Risiko</span>
        </a>
        <div id="penilaianRisiko" class="collapse" aria-labelledby="headingpenilaianRisiko" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Identifikasi Risiko</a>
                <a class="collapse-item" href="">Analisa Risiko</a>
                <a class="collapse-item" href="">Evaluasi Risiko</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-hand-holding-heart"></i>
            <span>Perlakuan Risiko</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pemantauanDanReview"
            aria-expanded="true" aria-controls="pemantauanDanReview">
            <i class="fas fa-fw fa-eye"></i>
            <span>Pemantauan & Review</span>
        </a>
        <div id="pemantauanDanReview" class="collapse" aria-labelledby="headingpemantauanDanReview"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Risiko Teregistrasi</a>
                <a class="collapse-item" href="">Near Miss</a>
                <a class="collapse-item" href="">Insiden</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pencatatanDanPelaporan"
            aria-expanded="true" aria-controls="pencatatanDanPelaporan">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pencatatan & Pelaporan</span>
        </a>
        <div id="pencatatanDanPelaporan" class="collapse" aria-labelledby="headingpencatatanDanPelaporan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Daftar Register Risiko</a>
                <a class="collapse-item" href="">Profil Risiko</a>
                <a class="collapse-item" href="">Pemantauan & Review</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lain-lain
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sasaranMutu"
            aria-expanded="true" aria-controls="sasaranMutu">
            <i class="fas fa-fw fa-bullseye"></i>
            <span>Sasaran Mutu</span>
        </a>
        <div id="sasaranMutu" class="collapse" aria-labelledby="headingsasaranMutu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Korporat</a>
                <a class="collapse-item" href="">Divisi</a>
                <a class="collapse-item" href="">Unit</a>
                <a class="collapse-item" href="">Bagian</a>
                <a class="collapse-item" href="">Seksi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pencapaianSasaranMutu"
            aria-expanded="true" aria-controls="pencapaianSasaranMutu">
            <i class="fas fa-fw fa-flag-checkered"></i>
            <span style="font-size:12px;">Pencapaian Sasaran Mutu</span>
        </a>
        <div id="pencapaianSasaranMutu" class="collapse" aria-labelledby="headingpencapaianSasaranMutu"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Rencana Pencapaian</a>
                <a class="collapse-item" href="">Jadwal Monitoring</a>
                <a class="collapse-item" href="">Monitoring</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pelaporanDanCatatan"
            aria-expanded="true" aria-controls="pelaporanDanCatatan">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Pelaporan & Catatan</span>
        </a>
        <div id="pelaporanDanCatatan" class="collapse" aria-labelledby="headingpelaporanDanCatatan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="">Register Sasaran Mutu</a>
                <a class="collapse-item" href="">Profil Sasaran Mutu</a>
                <a class="collapse-item" href="">Pemantauan & Review</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('setupAwal')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setupAwal"
            aria-expanded="true" aria-controls="setupAwal">
            <i class="fas fa-fw fa-tools"></i>
            <span>Setup Awal</span>
        </a>
        <div id="setupAwal" class="collapse" aria-labelledby="headingsetupAwal" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bagian.index') }}">Bagian</a>
                <a class="collapse-item" href="{{ route('seksi.index') }}">Seksi</a>
                <a class="collapse-item" href="{{ route('sub_seksi.index') }}">Sub Seksi</a>
                <a class="collapse-item" href="">Jabatan</a>
                <a class="collapse-item" href="">User / Pengguna</a>
                <a class="collapse-item" href="">Master Dampak</a>
                <a class="collapse-item" href="">Master Probabilitas</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
