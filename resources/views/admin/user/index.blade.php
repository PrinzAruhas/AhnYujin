<!-- Tambahkan link Google Fonts di layout utama (jika belum ada) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 255, 255, 0.05);
        transition: all 0.2s ease-in-out;
    }

    .btn {
        font-weight: 500;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0" style="color: #00ffff; text-shadow: 0 0 4px #00ffff;">Manajemen User</h3>
        <a href="/admin/user/create" class="btn" style="background-color: #00ff88; color: #000; font-weight: bold; box-shadow: 0 0 8px #00ff88;">
            + Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #062; color: #fff; border: 1px solid #0f0;">
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded" style="background-color: #0f0f1a; border: 1px solid #00ffff;">
        <table class="table table-hover table-bordered mb-0" style="color: #ffffff; border-color: #00ffff;">
            <thead style="background-color: #1a1a2e; color: #00ffff;">
                <tr>
                    <th scope="col" style="width: 60px;">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col" style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; border: 2px solid #00ffff; box-shadow: 0 0 6px #00ffff;">
                            <img src="{{ $row->foto ? asset('storage/' . $row->foto) : asset('default-profile.png') }}" alt="Foto" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                        <a href="/admin/user/{{ $row->id }}/edit" class="btn btn-sm" style="border: 1px solid #ffc107; color: #ffc107; box-shadow: 0 0 6px #ffc107;">Edit</a>
                        <form action="/admin/user/{{ $row->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" style="border: 1px solid #ff3860; color: #ff3860; box-shadow: 0 0 6px #ff3860;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
