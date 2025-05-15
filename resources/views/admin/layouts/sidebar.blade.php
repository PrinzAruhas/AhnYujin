<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(135deg, #1e3c72, #2a5298);">
  <!-- Brand Logo -->
  <a href="/" class="brand-link d-flex align-items-center justify-content-center py-3" style="background-color: #ff6f61;">
    <span class="brand-text font-weight-bold text-white" style="font-size: 20px;">
      <i class="fas fa-store me-2"></i> Distro Anyujin
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar pt-4">

    <!-- User Panel -->
    <div class="d-flex flex-column align-items-center mb-4 text-white">
      <img src="{{ Auth::user()->foto 
          ? asset('storage/user/' . Auth::user()->foto) 
          : asset('storage/97c98394-9543-440a-af08-80cd84c2a4c6.jpeg') }}"
          alt="User Profile" 
          class="rounded-circle shadow-sm mb-2" 
          style="width: 70px; height: 70px; object-fit: cover; border: 3px solid #ff6f61;">
      <strong style="font-size: 16px;">{{ Auth::user()->name ?? 'Admin' }}</strong>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item mb-1">
          <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}" style="color: #f0f0f0;">
            <i class="nav-icon fas fa-tachometer-alt" style="color: #00d1b2;"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item mb-1">
          <a href="/admin/kategori" class="nav-link {{ Request::is('admin/kategori*') ? 'active' : '' }}" style="color: #f0f0f0;">
            <i class="nav-icon fas fa-list-alt" style="color: #ffdd57;"></i>
            <p>Kategori</p>
          </a>
        </li>

        <li class="nav-item mb-1">
          <a href="/admin/produk" class="nav-link {{ Request::is('admin/produk*') ? 'active' : '' }}" style="color: #f0f0f0;">
            <i class="nav-icon fas fa-box-open" style="color: #48c774;"></i>
            <p>Produk</p>
          </a>
        </li>

        <li class="nav-item mb-1">
          <a href="/admin/transaksi" class="nav-link {{ Request::is('admin/transaksi') ? 'active' : '' }}" style="color: #f0f0f0;">
            <i class="nav-icon fas fa-money-check-alt" style="color: #ff3860;"></i>
            <p>Transaksi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" style="color: #f0f0f0;">
            <i class="nav-icon fas fa-user-friends" style="color: #3273dc;"></i>
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
