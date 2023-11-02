<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup> SPK</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Barang</span></a>
    </li> --}}
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('supplier.index') }}">
            <i class="fas fa-fw fa-industry"></i>
            <span>Supplier</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
            <i class="fas fa-fw fa-check"></i>
            <span>Kriteria</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-subscript"></i>
            <span>Sub Kriteria</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-weight"></i>
            <span>Bobot</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('penilaian.index') }}">
            <i class="fas fa-fw fa-star"></i>
            <span>Penilaian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('hasil.index') }}">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Hasil</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
