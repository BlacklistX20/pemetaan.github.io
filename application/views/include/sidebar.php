<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-map"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pemetaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="3">
                <i class="fas fa-seedling"></i>
                <span>Syarat Tumbuh Tanam</span></a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Nav Item -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'Admin/iklim'; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Database Iklim</span></a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'Admin/riwayat'; ?>">
                <i class="fa fa-history"></i>
                <span>Riwayat</span></a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->