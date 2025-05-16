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
    <div class="d-flex flex-column align-items-center text-center mb-4">
      <div style="
        width: 130px;
        height: 130px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #ff6f61;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      ">
        <img src="{{ asset('storage/e2614b1f-b454-42a5-98cc-8d5824695930.jpeg') }}" alt="User Profile" style="width: 130px; height: 130px; object-fit: cover;">
      </div>
      <strong style="color: white; font-size: 16px; margin-top: 10px;">
        {{ Auth::user()->name ?? 'Admin' }}
      </strong>
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
