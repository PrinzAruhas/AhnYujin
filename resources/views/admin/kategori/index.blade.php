<div class="row py-4">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow rounded-4">
            <div class="card-body">
                <h4 class="fw-bold mb-4">{{ $title }}</h4>

                <a href="/admin/kategori/create" class="btn btn-primary mb-3">
                    <i class="fas fa-plus me-1"></i>Tambah Kategori
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col" width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/admin/kategori/{{ $item->id }}/edit" class="btn btn-info btn-sm me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="/admin/kategori/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $kategori->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
