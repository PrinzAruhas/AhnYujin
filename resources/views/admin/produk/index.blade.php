<div class="row p-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0">{{ $title }}</h4>
                    <a href="/admin/produk/create" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Produk
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Stok</th> {{-- kolom stok --}}
                                <th scope="col" class="text-end">Harga</th> {{-- kolom harga --}}
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                {{-- Kolom Gambar --}}
                                <td>
                                    @if($item->gambar)
                                        <img src="/{{ $item->gambar }}" alt="{{ $item->name }}" width="60" class="rounded shadow-sm">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>

                                <td>{{ $item->name }}</td>

                                {{-- Kolom Stok --}}
                                <td>{{ $item->stok ?? 0 }}</td>

                                {{-- Kolom Harga --}}
                                <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                                <td class="text-end">
                                    <a href="/admin/produk/{{ $item->id }}/edit" class="btn btn-sm btn-outline-info me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/produk/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $produk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
