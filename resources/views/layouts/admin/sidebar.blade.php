<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-crop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN CROPPY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Kategori -->
    <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
        <a class="nav-link" href="/categories">
            <i class="fas fa-list"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item {{ request()->is('admin/products*') ? 'active' : '' }}">
        <a class="nav-link" href="/products">
            <i class="fas fa-boxes"></i>
            <span>Produk</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>