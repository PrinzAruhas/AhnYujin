<div class="row py-4">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow rounded-4">
            <div class="card-body">
                <h4 class="fw-bold mb-4">{{ $title }}</h4>

                @isset($kategori)
                    <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
                        @method('PUT')
                @else
                    <form action="/admin/kategori" method="POST">
                @endisset

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" name="name" id="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Contoh: Elektronik, Pakaian, dll"
                            value="{{ isset($kategori) ? $kategori->name : old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/admin/kategori" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
