<div class="row py-4">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow rounded-4 border-0">
            <div class="card-body p-4">
                <h4 class="mb-4 fw-semibold">Form Transaksi</h4>

                {{-- Form pilih produk --}}
                <form method="GET" class="mb-3">
                    <label class="form-label">Kode Produk</label>
                    <div class="input-group">
                        <select name="produk_id" class="form-select">
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produk as $item)
                            <option value="{{ $item->id }}" {{ request('produk_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-check me-1"></i> Pilih
                        </button>
                    </div>
                </form>

                {{-- Form simpan transaksi --}}
                <form method="POST" action="/admin/transaksi/detail/create">
                    @csrf

                    <input type="hidden" name="transaksi_id" value="{{ Request::segment(3) }}">
                    <input type="hidden" name="produk_id" value="{{ isset($p_detail) ? $p_detail->id : '' }}">
                    <input type="hidden" name="produk_name" value="{{ isset($p_detail) ? $p_detail->name : '' }}">
                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">

                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" value="{{ $p_detail->name ?? '' }}" class="form-control" name="nama_produk" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Satuan</label>
                        <input type="text" value="{{ $p_detail->harga ?? '' }}" class="form-control" disabled name="harga_satuan">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">QTY</label>
                        <div class="input-group">
                            <a href="?produk_id={{ request('produk_id') }}&act=min&qty={{ $qty }}" class="btn btn-outline-primary">
                                <i class="fas fa-minus"></i>
                            </a>
                            <input type="number" class="form-control text-center" name="qty" value="{{ $qty }}" readonly>
                            <a href="?produk_id={{ request('produk_id') }}&act=plus&qty={{ $qty }}" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5 class="text-success">Subtotal: <strong>Rp.{{ format_rupiah($subtotal) }}</strong></h5>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/admin/transaksi" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Tambah <i class="fas fa-arrow-right"></i>
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
                <h5 class="mb-3 fw-semibold">Daftar Produk</h5>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>QTY</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    @foreach ($transaksi_detail as $item)



                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->produk_name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ 'Rp. '.format_rupiah ($item->subtotal) }}</td>
                            <td>
                                <a href="/admin/transaksi/detail/delete?id={{ $item->id }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

                <div class="d-flex gap-2">
                    <a href="/admin/transaksi/detail/selesai/{{ Request::segment(3) }}" class="btn btn-success"><i class="fas fa-check"></i> Selesai</a>
                    <a href="{{ route('transaksi.cetak', $transaksi->id) }}" class="btn btn-sm btn-primary">
  <i class="fas fa-receipt"></i> Cetak Struk
</a>


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
                <h5 class="fw-semibold mb-3">Pembayaran</h5>
                <form>
                    <form action="" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Total Belanja</label>
                            <input type="number" value="{{ $transaksi->total }}" name="total_belanja" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dibayarkan</label>
                            <input type="number" value="{{ request('dibayarkan') }}" name="dibayarkan" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Hitung</button>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Uang Kembalian</label>
                            <input type="number" value="{{ format_rupiah($kembalian) }}" disabled name="kembalian" class="form-control">
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>