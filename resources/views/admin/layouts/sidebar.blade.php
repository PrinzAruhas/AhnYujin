<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="
  background: linear-gradient(180deg, #181824 0%, #252a42 100%);
  box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.7);
  border-right: 1px solid #3c3c50;
  min-height: 100vh;
  width: 260px;
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  z-index: 1050;
  font-family: 'Poppins', sans-serif;
">

  <!-- Brand Logo -->
  <a href="/" class="brand-link d-flex align-items-center justify-content-center py-4" style="
    background-color: #20243a;
    box-shadow: 0 3px 15px rgba(106, 179, 248, 0.5);
    font-weight: 700;
    font-size: 22px;
    color: #6ab3f8;
    letter-spacing: 1.1px;
    text-shadow: 0 0 8px #6ab3f8aa;
    user-select: none;
    transition: background-color 0.3s ease;
  " onmouseenter="this.style.backgroundColor='#2e3560'" onmouseleave="this.style.backgroundColor='#20243a'">
    <i class="fas fa-store me-2" style="color: #7ec6ff; font-size: 1.5rem;"></i> Distro Anyujin
  </a>

  <!-- Sidebar Content -->
  <div class="sidebar pt-5 text-center flex-grow-1 d-flex flex-column justify-content-between">

    <!-- User Panel -->
    <div class="d-flex flex-column align-items-center px-4 mb-5">
      <div style="
        width: 110px;
        height: 110px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #6ab3f8;
        box-shadow: 0 0 15px rgba(106, 179, 248, 0.6);
        transition: box-shadow 0.3s ease;
      " onmouseenter="this.style.boxShadow='0 0 25px #6ab3f8'" onmouseleave="this.style.boxShadow='0 0 15px rgba(106, 179, 248, 0.6)'">
        <img src="{{ Auth::user() && Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('default-profile.png') }}"
          alt="User Profile"
          style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.95);">
      </div>
      <strong style="
        color: #d6d9ff;
        font-size: 16px;
        margin-top: 12px;
        text-shadow: 0 0 6px #6ab3f8cc;
        user-select: none;
      ">
        {{ Auth::user()->name ?? 'Admin' }}
      </strong>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 px-3">
      <ul class="nav nav-pills nav-sidebar flex-column" style="gap: 14px; padding: 0;">
        @php
          $menu = [
            ['url' => '/', 'icon' => 'tachometer-alt', 'label' => 'Dashboard'],
            ['url' => '/admin/kategori', 'icon' => 'list-alt', 'label' => 'Kategori'],
            ['url' => '/admin/produk', 'icon' => 'box-open', 'label' => 'Produk'],
            ['url' => '/admin/transaksi', 'icon' => 'money-check-alt', 'label' => 'Transaksi'],
            ['url' => '/admin/user', 'icon' => 'user-friends', 'label' => 'User'],
          ];
        @endphp

        @foreach ($menu as $item)
          @php
            $path = ltrim($item['url'], '/');
            $isActive = Request::is($path) || Request::is($path . '/*');
          @endphp
          <li class="nav-item">
            <a href="{{ $item['url'] }}" class="nav-link {{ $isActive ? 'active' : '' }}" style="
              display: flex;
              align-items: center;
              gap: 12px;
              color: {{ $isActive ? '#a3bffa' : '#c4c9e8cc' }};
              background-color: {{ $isActive ? 'rgba(106, 179, 248, 0.25)' : 'transparent' }};
              border-radius: 12px;
              padding: 12px 18px;
              font-size: 15px;
              font-weight: 600;
              transition: background-color 0.3s ease, color 0.3s ease;
              user-select: none;
            " onmouseenter="this.style.backgroundColor='rgba(106, 179, 248, 0.15)'; this.style.color='#8bb7ff';"
              onmouseleave="this.style.backgroundColor='{{ $isActive ? 'rgba(106, 179, 248, 0.25)' : 'transparent' }}'; this.style.color='{{ $isActive ? '#a3bffa' : '#c4c9e8cc' }}';">
              <i class="fas fa-{{ $item['icon'] }}" style="min-width: 24px; text-align: center; color: #6ab3f8; font-size: 18px;"></i>
              <span>{{ $item['label'] }}</span>
            </a>
          </li>
        @endforeach
      </ul>
    </nav>

    <!-- Footer / Logout -->
    <div class="mb-4 px-3 text-center">
      <a href="/logout" class="btn btn-outline-light w-100" style="
        border-radius: 14px;
        font-weight: 600;
        padding: 10px 0;
        color: #6ab3f8;
        border-color: #6ab3f8;
        transition: background-color 0.3s ease, color 0.3s ease;
      " onmouseenter="this.style.backgroundColor='#6ab3f8'; this.style.color='#1a1a2e';"
        onmouseleave="this.style.backgroundColor='transparent'; this.style.color='#6ab3f8';">
        <i class="fas fa-sign-out-alt me-2"></i> Logout
      </a>
    </div>

  </div>
</aside>

<!-- Content Wrapper -->
<div class="content-wrapper" style="
  margin-left: 260px;
  background: linear-gradient(90deg, #1e2037, #141528);
  color: #e1e4ff;
  padding: 2rem 2.5rem;
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;
  transition: background-color 0.3s ease;
  user-select: none;
">
