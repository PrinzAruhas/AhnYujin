<div class="row py-4">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow rounded-4 border-0" style="background: #1a1a2e; color: #ffffff;">
            <div class="card-body">
                <h4 class="fw-bold mb-4 text-info">{{ $title }}</h4>

                @isset($kategori)
                    <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
                        @method('PUT')
                @else
                    <form action="/admin/kategori" method="POST">
                @endisset

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-light">Nama Kategori</label>
                        <input type="text" name="name" id="name" 
                            class="form-control bg-dark text-white border-info @error('name') is-invalid @enderror" 
                            placeholder="Contoh: Elektronik, Pakaian, dll"
                            value="{{ isset($kategori) ? $kategori->name : old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="/admin/kategori" class="btn btn-outline-secondary border-0" style="background: #2c2c3e; color: #ccc;">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-outline-info border-0" style="background: #00d9ff; color: #000;">
                            <i class="fas fa-save me-1"></i>Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
