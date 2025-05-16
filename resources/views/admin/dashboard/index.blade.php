<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Kasir - Vibes Korea</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Google Font Noto Sans KR -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;600&display=swap" rel="stylesheet" />

<style>
    /* Body & font */
    body {
        background-color: #0a0a0f; /* very dark */
        color: #c7d2ff; /* soft periwinkle blue */
        font-family: 'Noto Sans KR', 'Segoe UI', sans-serif;
        min-height: 100vh;
    }

    /* Welcome card with subtle gradient and glow */
    .welcome-card {
        background: linear-gradient(135deg, #293462, #526288);
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(41, 52, 98, 0.7);
        color: #e1e6fa;
        padding: 2rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        animation: fadeInUp 0.8s ease forwards;
    }

    /* Avatar style */
    .welcome-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #a7c7ff;
        box-shadow: 0 0 12px #7993ff80;
        background-color: #1c1f3c;
    }

    /* Animations */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Header text */
    h4 {
        font-weight: 600;
        color: #acc9ff;
        text-shadow: 0 0 6px #7ea5ff90;
    }

    p {
        color: #bec9ffcc;
    }

    /* Quick actions container */
    .quick-actions {
        margin-top: 2.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    /* Buttons with Korean pastel cyan/blue vibe */
    .quick-actions .btn {
        flex: 1 1 calc(33.333% - 1rem);
        border-radius: 14px;
        font-weight: 600;
        padding: 1rem 0;
        box-shadow: 0 0 15px rgba(122, 151, 255, 0.4);
        color: #d6e0ff;
        border: 2px solid transparent;
        background-color: #4a67ff;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.7rem;
    }

    .quick-actions .btn i {
        font-size: 1.3rem;
    }

    .quick-actions .btn:hover {
        background-color: #7f99ff;
        box-shadow: 0 0 25px #a5b9ffcc;
        color: #e6ecff;
        text-decoration: none;
    }

    /* Smaller screen adjustment */
    @media (max-width: 767px) {
        .quick-actions .btn {
            flex: 1 1 100%;
        }
    }

    /* Link styles override */
    a.btn {
        text-decoration: none;
    }
</style>

</head>
<body>

<div class="container mt-5">
<!-- Welcome Card -->
<div class="welcome-card">
    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4a67ff&color=fff&size=80" alt="Avatar" class="welcome-avatar" />
    <div>
        <h4>
            <i class="bi bi-cash-coin me-2"></i>
            Selamat Datang, <strong>{{ auth()->user()->name }}</strong>!
        </h4>
        <p>Kamu berada di <strong>Halaman Kasir Anyujin</strong>. Siap untuk mulai transaksi? 🚀</p>
    </div>
</div>

<!-- Quick Actions -->
<h5 class="mt-5 mb-3" style="color: #7993ff; text-shadow: 0 0 5px #a5b9ffbb;">Aksi Cepat</h5>
<div class="quick-actions">
    <a href="{{ route('transaksi.create') }}" class="btn">
        <i class="bi bi-plus-circle"></i> Transaksi Baru
    </a>
    <a href="{{ route('transaksi.index') }}" class="btn">
        <i class="bi bi-clock-history"></i> Riwayat Transaksi
    </a>
    <a href="{{ route('produk.index') }}" class="btn">
        <i class="bi bi-box-seam"></i> Daftar Produk
    </a>
</div>

</div>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html> 
