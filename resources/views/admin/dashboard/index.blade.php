<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .welcome-card {
            background: linear-gradient(135deg, #198754, #28a745);
            color: white;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .welcome-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
        }

        .quick-actions .btn {
            border-radius: 12px;
        }

        .section-title {
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <!-- Welcome Card -->
    <div class="welcome-card p-4 d-flex align-items-center">
        <div class="me-4">
            <!-- Ganti src avatar sesuai kebutuhan -->
            <img src="{{ asset('storage/Anyujin.jpeg') }}" alt="User Profile"
    class="rounded-full object-cover border border-blue-500 shadow"
    style="width: 50px; height: 50px;" />

        </div>
        <div>
            <h4 class="mb-1">
                <i class="bi bi-cash-coin me-2"></i>
                Selamat Datang, <strong>{{ auth()->user()->name }}</strong>!
            </h4>
            <p class="mb-0">Kamu berada di <strong>Halaman Kasir Anyujin</strong>. Siap untuk mulai transaksi? 🚀</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <h5 class="section-title text-success">Aksi Cepat</h5>
    <div class="row quick-actions">
        <div class="col-md-4 mb-3">
            <a href="{{ route('transaksi.create') }}" class="btn btn-outline-success w-100 py-3">
                <i class="bi bi-plus-circle me-2"></i> Transaksi Baru
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('transaksi.index') }}" class="btn btn-outline-primary w-100 py-3">
                <i class="bi bi-clock-history me-2"></i> Riwayat Transaksi
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-dark w-100 py-3">
                <i class="bi bi-box-seam me-2"></i> Daftar Produk
            </a>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>