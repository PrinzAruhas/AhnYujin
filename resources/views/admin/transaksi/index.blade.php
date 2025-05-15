<div class="row p-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0">{{ $title }}</h4>
                    <a href="/admin/transaksi/create" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Transaksi
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col" class="text-end">Total Harga</th> {{-- kolom harga --}}
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                {{-- Kolom Tanggal --}}
                                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                
                                {{-- Kolom Total Harga --}}
                                <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>

                                <td class="text-end">
                                    <a href="/admin/transaksi/{{ $item->id }}/edit" class="btn btn-sm btn-outline-info me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/transaksi/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
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
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
