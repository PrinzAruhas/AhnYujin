<style>
  body {
    font-family: 'Noto Sans KR', sans-serif;
    background-color: #000000; /* background hitam */
    color: #4A90E2; /* teks biru */
  }

  .card-korea {
    background: #121212; /* card background agak gelap */
    border-radius: 1.25rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
    padding: 2rem;
    border: none;
    color: #4A90E2;
  }

  .btn-korea {
    border-radius: 999px;
    padding: 0.5rem 1.5rem;
    font-weight: 500;
    transition: 0.2s;
    color: #fff;
  }

  .btn-korea-primary {
    background-color: #4A90E2;
    color: white;
  }

  .btn-korea-primary:hover {
    background-color: #357ABD;
  }

  .form-control {
    border-radius: 1rem;
    background-color: #222222;
    color: #4A90E2;
    border: 1px solid #4A90E2;
  }

  .form-control[readonly] {
    background-color: #121212;
    color: #4A90E2;
  }

  .input-group .btn {
    border-radius: 1rem !important;
    color: #4A90E2;
    background-color: transparent;
    border: 1px solid #4A90E2;
  }

  .input-group .btn:hover {
    background-color: #357ABD;
    color: white;
    border-color: #357ABD;
  }

  .table thead {
    background-color: #222222;
    font-weight: 500;
    color: #4A90E2;
  }

  .table tbody tr {
    border-bottom: 1px solid #333333;
    color: #4A90E2;
  }

  .text-muted-sm {
    font-size: 0.9rem;
    color: #7BAAF7; /* biru muda untuk teks muted */
  }

  a.btn-danger {
    background-color: #D9534F;
    border-color: #D9534F;
  }

  a.btn-danger:hover {
    background-color: #C9302C;
    border-color: #C9302C;
  }

  .text-success {
    color: #5CB85C !important;
  }

  .btn-success {
    background-color: #5CB85C;
    border-color: #5CB85C;
    color: white;
  }

  .btn-success:hover {
    background-color: #4CAE4C;
    border-color: #4CAE4C;
  }
</style>


<div class="container py-4">
  <div class="row g-4">
    <!-- Form transaksi -->
    <div class="col-lg-6">
      <div class="card-korea">
        <h4 class="mb-3 text-primary">🛒 Transaksi</h4>

        <form method="GET" class="mb-3">
          <label for="produk_id" class="form-label">Pilih Produk</label>
          <div class="input-group">
            <select name="produk_id" id="produk_id" class="form-select">
              <option value="">-- Pilih Produk --</option>
              @foreach ($produk as $item)
                <option value="{{ $item->id }}" {{ request('produk_id') == $item->id ? 'selected' : '' }}>
                  {{ $item->name }}
                </option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-korea btn-korea-primary">Pilih</button>
          </div>
        </form>

        <form method="POST" action="/admin/transaksi/detail/create">
          @csrf
          <input type="hidden" name="transaksi_id" value="{{ Request::segment(3) }}">
          <input type="hidden" name="produk_id" value="{{ $p_detail->id ?? '' }}">
          <input type="hidden" name="produk_name" value="{{ $p_detail->name ?? '' }}">
          <input type="hidden" name="subtotal" value="{{ $subtotal }}">

          <div class="mb-2">
            <label class="form-label">Nama Produk</label>
            <input type="text" class="form-control" value="{{ $p_detail->name ?? '' }}" readonly>
          </div>

          <div class="mb-2">
            <label class="form-label">Harga Satuan</label>
            <input type="text" class="form-control" value="Rp {{ format_rupiah($p_detail->harga ?? 0) }}" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <div class="input-group" style="max-width: 160px;">
              <a href="?produk_id={{ request('produk_id') }}&act=min&qty={{ $qty }}" class="btn btn-outline-secondary">-</a>
              <input type="number" class="form-control text-center" name="qty" value="{{ $qty }}" readonly>
              <a href="?produk_id={{ request('produk_id') }}&act=plus&qty={{ $qty }}" class="btn btn-outline-secondary">+</a>
            </div>
          </div>

          <p class="fw-semibold text-success">Subtotal: Rp {{ format_rupiah($subtotal) }}</p>

          <div class="d-flex justify-content-between mt-4">
            <a href="/admin/transaksi" class="btn btn-outline-secondary btn-korea">Kembali</a>
            <button type="submit" class="btn btn-korea btn-korea-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Sidebar daftar produk -->
    <div class="col-lg-6">
      <div class="card-korea">
        <h5 class="mb-3 text-primary">📦 Daftar Produk</h5>
        <div class="table-responsive" style="max-height: 400px;">
          <table class="table table-borderless align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th class="text-center">Qty</th>
                <th class="text-end">Subtotal</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksi_detail as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->produk_name }}</td>
                <td class="text-center">{{ $item->qty }}</td>
                <td class="text-end">Rp {{ format_rupiah($item->subtotal) }}</td>
                <td class="text-center">
                  <a href="/admin/transaksi/detail/delete?id={{ $item->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus item ini?')">
                    🗑️
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex gap-2 mt-3">
          <a href="/admin/transaksi/detail/selesai/{{ Request::segment(3) }}" class="btn btn-success flex-grow-1">Selesai</a>
          <a href="{{ route('transaksi.cetak', ['id' => $transaksi->id, 'dibayarkan' => request('dibayarkan')]) }}" class="btn btn-primary flex-grow-1" target="_blank">
            Cetak Struk
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Pembayaran -->
  <div class="row mt-4">
    <div class="col-md-6 mx-auto">
      <div class="card-korea">
        <h5 class="text-primary mb-3">💳 Pembayaran</h5>
        <form method="GET" class="row g-3">
          <div class="col-12">
            <label class="form-label">Total Belanja</label>
            <input type="text" class="form-control fw-bold bg-light" value="Rp {{ format_rupiah($transaksi->total) }}" readonly>
          </div>

          <div class="col-12">
            <label class="form-label">Dibayarkan</label>
            <input type="number" name="dibayarkan" class="form-control" min="0" step="1000" value="{{ request('dibayarkan') }}" required>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-korea btn-korea-primary w-100">Hitung</button>
          </div>

          <div class="col-12">
            <label class="form-label">Kembalian</label>
            <input type="text" class="form-control fw-bold text-success" value="Rp {{ format_rupiah($kembalian) }}" readonly>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tambahkan font -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap" rel="stylesheet">
