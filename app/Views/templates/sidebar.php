<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HWA <sup>Programing</sup></div>
    </a>
    <?php if (in_groups('admin')) : ?>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User Management
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - user -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-user"></i>
                <span>User List</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pelaporan'); ?>">
                <i class="fas fa-user"></i>
                <span>Informasi Masyarakat</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('tanggapan/inputdata'); ?>">
                <i class="fas fa-user"></i>
                <span>Input Tanggapan</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Profile
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Nav Item - Edit Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pelaporan/inputdata'); ?>">
            <i class="fas fa-user-edit"></i>
            <span>Laporan Masyarakat</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tanggapan'); ?>">
            <i class="fas fa-user-edit"></i>
            <span>Hasil Tanggapan </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>