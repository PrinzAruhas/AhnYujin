<div class="row p-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow rounded-4" style="background: linear-gradient(145deg, #0f0f1a, #1a1a2e); color: #e0e0e0; border: 1px solid #00ffff;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0" style="color: #00ffff; text-shadow: 0 0 4px #00ffff;">{{ $title }}</h4>
                    <a href="/admin/produk/create" class="btn" style="background-color: #ff00ff; color: #fff; box-shadow: 0 0 10px #ff00ff;">
                        <i class="fas fa-plus me-1"></i> Tambah Produk
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle" style="background-color: #0f0f1a; color: #ffffff; border-color: #00ffff;">
                        <thead style="background-color: #1f1f3a; color: #00ffff;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Stok</th>
                                <th scope="col" class="text-end">Harga</th>
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($item->gambar)
                                        <img src="/{{ $item->gambar }}" alt="{{ $item->name }}" width="60" class="rounded shadow-sm" style="border: 2px solid #ff00ff;">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->stok ?? 0 }}</td>
                                <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="text-end">
                                    <a href="/admin/produk/{{ $item->id }}/edit" class="btn btn-sm" style="border: 1px solid #00d1ff; color: #00d1ff; box-shadow: 0 0 6px #00d1ff;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/produk/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm" style="border: 1px solid #ff3860; color: #ff3860; box-shadow: 0 0 6px #ff3860;" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    {{ $produk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
