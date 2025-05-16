<div class="row py-4">
    <div class="col-lg-6">
        <div class="card shadow rounded-4 border-0" style="background: #1a1a2e; color: #fff;">
            <div class="card-body">
                <h4 class="fw-bold mb-4 text-info">{{ $title }}</h4>

                @isset ($produk)
                    <form action="/admin/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="/admin/produk" method="POST" enctype="multipart/form-data">
                @endisset

                @csrf

                {{-- Nama Produk --}}
                <div class="mb-3">
                    <label class="form-label text-light">Nama Produk</label>
                    <input type="text" name="name" 
                        class="form-control bg-dark text-white border-info @error('name') is-invalid @enderror"
                        placeholder="Nama Produk" 
                        value="{{ isset($produk) ? $produk->name : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="mb-3">
                    <label class="form-label text-light">Kategori</label>
                    <select name="kategori_id" 
                        class="form-select bg-dark text-white border-success @error('kategori_id') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}"
                                {{ isset($produk) && $item->id == $produk->kategori_id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label class="form-label text-light">Harga</label>
                    <input type="number" name="harga" 
                        class="form-control bg-dark text-white border-warning @error('harga') is-invalid @enderror"
                        placeholder="Harga Produk" 
                        value="{{ isset($produk) ? $produk->harga : old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label class="form-label text-light">Stok</label>
                    <input type="number" name="stok" 
                        class="form-control bg-dark text-white border-danger @error('stok') is-invalid @enderror"
                        placeholder="Stok" 
                        value="{{ isset($produk) ? $produk->stok : old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div class="mb-3">
                    <label class="form-label text-light">Gambar Produk</label>
                    <input type="file" name="gambar" 
                        class="form-control bg-dark text-white border-info @error('gambar') is-invalid @enderror">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="/admin/produk" class="btn btn-outline-secondary border-0" style="background: #2c2c3e; color: #ccc;">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                    <button type="submit" class="btn border-0" style="background: #00ffc3; color: #000;">
                        <i class="fas fa-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
