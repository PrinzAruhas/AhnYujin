<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link d-flex align-items-center justify-content-center">
    <span class="brand-text font-weight-bold text-white">MyAdmin Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/kategori" class="nav-link {{ Request::is('admin/kategori*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>Kategori</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/produk" class="nav-link {{ Request::is('admin/produk*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Produk</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/transaksi" class="nav-link {{ Request::is('admin/transaksi') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-check-alt"></i>
            <p>Transaksi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>User</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<div class="content-wrapper">
