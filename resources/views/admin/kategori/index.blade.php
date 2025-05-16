<div class="row py-4">
  <div class="col-lg-8 col-md-10 col-sm-12 mx-auto px-3">
    <div class="card shadow rounded-4" style="
      background: linear-gradient(145deg, #1a1a2e, #16213e);
      color: #e0e0e0;
      border: 1px solid #00ffff;
      ">
      <div class="card-body">

        <h4 class="fw-bold mb-4 text-center" style="
          color: #00ffff;
          text-shadow: 0 0 8px #00ffff;
          user-select: none;
          font-family: 'Poppins', sans-serif;
        ">
          {{ $title }}
        </h4>

        <a href="/admin/kategori/create" class="btn mb-3 w-100 w-md-auto" style="
          background-color: #ff00ff;
          color: #fff;
          box-shadow: 0 0 12px #ff00ff;
          font-weight: 600;
          user-select: none;
          transition: box-shadow 0.3s ease;
        " onmouseenter="this.style.boxShadow='0 0 20px #ff33ff'" onmouseleave="this.style.boxShadow='0 0 12px #ff00ff'">
          <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>

        <div class="table-responsive" style="overflow-x: auto; scrollbar-width: thin; scrollbar-color: #00ffff transparent;">
          <table class="table table-bordered table-hover align-middle" style="
            background-color: #0f0f1a;
            color: #ffffff;
            border-color: #00ffff;
            min-width: 320px;
          ">
            <thead style="background-color: #1f1f3a; color: #00ffff;">
              <tr>
                <th scope="col" width="5%" style="white-space: nowrap;">No</th>
                <th scope="col" style="white-space: nowrap;">Nama Kategori</th>
                <th scope="col" width="20%" style="white-space: nowrap;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kategori as $item)
              <tr style="transition: background-color 0.3s ease;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                  <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start">
                    <a href="/admin/kategori/{{ $item->id }}/edit" class="btn btn-info btn-sm" style="box-shadow: 0 0 8px #00d1ff; min-width: 40px;">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="/admin/kategori/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm" style="box-shadow: 0 0 8px #ff3131; min-width: 40px;">
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
        <div class="mt-3 d-flex justify-content-center">
          {{ $kategori->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* Scrollbar warna cyan neon halus */
  .table-responsive::-webkit-scrollbar {
    height: 6px;
  }
  .table-responsive::-webkit-scrollbar-track {
    background: transparent;
  }
  .table-responsive::-webkit-scrollbar-thumb {
    background-color: #00ffff;
    border-radius: 10px;
  }

  /* Hover baris tabel neon */
  tbody tr:hover {
    background-color: #16213e;
    box-shadow: 0 0 12px #00ffffaa inset;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  /* Responsive font table lebih kecil di layar kecil */
  @media (max-width: 576px) {
    table {
      font-size: 14px;
    }
    .btn-sm {
      font-size: 13px;
      padding: 4px 8px;
    }
  }
</style>
