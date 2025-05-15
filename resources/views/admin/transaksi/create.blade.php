<div class="row py-4">
  <div class="col-lg-6 mx-auto">
    <div class="card shadow-sm rounded-4 border-0">
      <div class="card-body p-4">
        <h4 class="mb-4 fw-bold text-primary">Form Transaksi</h4>

        {{-- Form pilih produk --}}
        <form method="GET" class="mb-4">
          <label for="produk_id" class="form-label fw-semibold">Pilih Produk</label>
          <div class="input-group">
            <select name="produk_id" id="produk_id" class="form-select rounded-start">
              <option value="">-- Pilih Produk --</option>
              @foreach ($produk as $item)
              <option value="{{ $item->id }}" {{ request('produk_id') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
              </option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-primary rounded-end">
              <i class="fas fa-check me-2"></i> Pilih
            </button>
          </div>
        </form>

        {{-- Form simpan transaksi --}}
        <form method="POST" action="/admin/transaksi/detail/create">
          @csrf
          <input type="hidden" name="transaksi_id" value="{{ Request::segment(3) }}">
          <input type="hidden" name="produk_id" value="{{ $p_detail->id ?? '' }}">
          <input type="hidden" name="produk_name" value="{{ $p_detail->name ?? '' }}">
          <input type="hidden" name="subtotal" value="{{ $subtotal }}">

          <div class="mb-3">
            <label class="form-label fw-semibold">Nama Produk</label>
            <input type="text" class="form-control bg-light" value="{{ $p_detail->name ?? '' }}" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Harga Satuan</label>
            <input type="text" class="form-control bg-light" value="Rp {{ format_rupiah($p_detail->harga ?? 0) }}" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Jumlah (QTY)</label>
            <div class="input-group" style="max-width: 140px;">
              <a href="?produk_id={{ request('produk_id') }}&act=min&qty={{ $qty }}" class="btn btn-outline-primary rounded-start">
                <i class="fas fa-minus"></i>
              </a>
              <input type="number" class="form-control text-center border-start-0 border-end-0" name="qty" value="{{ $qty }}" readonly>
              <a href="?produk_id={{ request('produk_id') }}&act=plus&qty={{ $qty }}" class="btn btn-outline-primary rounded-end">
                <i class="fas fa-plus"></i>
              </a>
            </div>
          </div>

          <div class="mb-4">
            <h5 class="text-success fw-bold">Subtotal: <span class="fs-5">Rp {{ format_rupiah($subtotal) }}</span></h5>
          </div>

          <div class="d-flex justify-content-between">
            <a href="/admin/transaksi" class="btn btn-outline-secondary">
              <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
              Tambah <i class="fas fa-arrow-right ms-1"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- Sidebar daftar produk --}}
  <div class="col-lg-6">
    <div class="card shadow-sm rounded-4 border-0">
      <div class="card-body p-4">
        <h5 class="mb-3 fw-bold text-primary">Daftar Produk</h5>
        <div class="table-responsive" style="max-height: 420px; overflow-y: auto;">
          <table class="table table-striped table-hover align-middle">
            <thead class="table-primary sticky-top">
              <tr>
                <th scope="col" style="width: 40px;">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col" style="width: 60px; text-align:center;">QTY</th>
                <th scope="col" style="width: 100px; text-align:right;">Subtotal</th>
                <th scope="col" style="width: 70px; text-align:center;">Aksi</th>
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
                  <a href="/admin/transaksi/detail/delete?id={{ $item->id }}" class="btn btn-sm btn-danger" title="Hapus item" onclick="return confirm('Yakin ingin hapus item ini?')">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex gap-2 mt-3">
          <a href="/admin/transaksi/detail/selesai/{{ Request::segment(3) }}" class="btn btn-success flex-grow-1">
            <i class="fas fa-check me-2"></i> Selesai
          </a>
          <a href="{{ route('transaksi.cetak', ['id' => $transaksi->id, 'dibayarkan' => request('dibayarkan')]) }}" class="btn btn-primary flex-grow-1" target="_blank">
            <i class="fas fa-receipt me-2"></i> Cetak Struk
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Pembayaran --}}
<div class="row py-3">
  <div class="col-md-6 mx-auto">
    <div class="card shadow-sm rounded-4 border-0">
      <div class="card-body p-4">
        <h5 class="fw-bold mb-3 text-primary">Pembayaran</h5>
        <form method="GET" class="row g-3">
          <div class="col-12">
            <label for="total_belanja" class="form-label fw-semibold">Total Belanja</label>
            <input type="text" id="total_belanja" class="form-control bg-light fw-bold" name="total_belanja" value="Rp {{ format_rupiah($transaksi->total) }}" readonly>
          </div>

          <div class="col-12">
            <label for="dibayarkan" class="form-label fw-semibold">Dibayarkan</label>
            <input type="number" id="dibayarkan" class="form-control" name="dibayarkan" value="{{ request('dibayarkan') }}" min="0" step="1000" placeholder="Masukkan jumlah uang dibayarkan" required>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">
              Hitung <i class="fas fa-calculator ms-2"></i>
            </button>
          </div>

          <div class="col-12">
            <hr>
          </div>

          <div class="col-12">
            <label for="kembalian" class="form-label fw-semibold">Uang Kembalian</label>
            <input type="text" id="kembalian" class="form-control fw-bold text-success" name="kembalian" value="Rp {{ format_rupiah($kembalian) }}" readonly>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
