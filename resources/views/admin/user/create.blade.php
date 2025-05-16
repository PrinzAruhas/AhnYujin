<!-- Tambah font Poppins dan Nanum Gothic (Korean font) -->
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
  body {
    background-color: #0e0e2f;
    font-family: 'Nanum Gothic', 'Poppins', sans-serif;
    color: #a0e9ff;
    min-height: 100vh;
    padding: 2rem 1rem;
  }

  .card {
    background: linear-gradient(135deg, #1a1a40, #2b2b5c);
    border-radius: 1.2rem;
    border: 1.5px solid #65d2ff;
    box-shadow:
      0 0 12px #4ac4ff,
      0 0 20px #a0e9ff;
  }

  .card-body {
    padding: 2.5rem;
  }

  h3 {
    color: #65d2ff;
    font-weight: 600;
    text-align: center;
    text-shadow: 0 0 10px #65d2ff;
    margin-bottom: 1.5rem;
    letter-spacing: 1.2px;
  }

  .form-floating > label {
    color: #90dfff;
    text-shadow: 0 0 5px #90dfff;
    font-weight: 500;
  }

  .form-control {
    background-color: #12142f;
    border: 1.8px solid #65d2ff;
    color: #a0e9ff;
    font-weight: 600;
    box-shadow: inset 0 0 8px #65d2ff;
    border-radius: 0.6rem;
    transition: 0.3s ease;
  }
  .form-control::placeholder {
    color: #65d2ffaa;
  }
  .form-control:focus {
    border-color: #00c9ff;
    box-shadow: 0 0 12px #00c9ff;
    background-color: #12142f;
    color: #d0f0ff;
  }
  .form-control.is-invalid {
    border-color: #ff5a7a;
    box-shadow: 0 0 10px #ff5a7a;
  }

  .invalid-feedback {
    color: #ff5a7a;
    font-weight: 600;
    text-shadow: 0 0 5px #ff5a7a;
  }

  .btn-primary {
    background: linear-gradient(90deg, #00d6ff, #0061ff);
    border: none;
    color: #e0f7ff;
    font-weight: 700;
    box-shadow: 0 0 15px #00d6ff;
    border-radius: 0.7rem;
    transition: 0.3s ease;
  }
  .btn-primary:hover, .btn-primary:focus {
    background: linear-gradient(90deg, #0061ff, #00d6ff);
    box-shadow: 0 0 25px #00d6ff;
    color: #fff;
  }

  .btn-outline-secondary {
    border-color: #65d2ff;
    color: #65d2ff;
    font-weight: 600;
    box-shadow: 0 0 8px #65d2ff;
    border-radius: 0.7rem;
    transition: 0.3s ease;
  }
  .btn-outline-secondary:hover {
    background-color: #65d2ff;
    color: #0e0e2f;
    box-shadow: 0 0 18px #65d2ff;
  }

  /* Tombol toggle password */
  .toggle-password {
    border-color: #65d2ff;
    color: #65d2ff;
    background: transparent;
    box-shadow: 0 0 6px #65d2ff;
    transition: 0.3s;
    border-radius: 0.4rem;
  }
  .toggle-password:hover {
    background-color: #65d2ff;
    color: #0e0e2f;
    box-shadow: 0 0 18px #65d2ff;
  }

  /* Preview foto */
  #foto-preview {
    display: block;
    margin-top: 0.75rem;
    max-width: 150px;
    border-radius: 1rem;
    border: 2.5px solid #65d2ff;
    box-shadow: 0 0 15px #65d2ff;
    transition: 0.3s ease;
  }
</style>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
          <h3 class="mb-4 fw-bold">
            {{ isset($user) ? 'Edit User' : 'Tambah User' }}
          </h3>

          <form action="{{ isset($user) ? '/admin/user/'.$user->id : '/admin/user' }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($user))
              @method('PUT')
            @endif

            <!-- Nama -->
            <div class="form-floating mb-3">
              <input type="text" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}"
                placeholder="Nama Lengkap" autocomplete="off">
              <label for="name">Nama Lengkap</label>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email -->
            <div class="form-floating mb-3">
              <input type="email" name="email" id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}"
                placeholder="Email" autocomplete="off">
              <label for="email">Email</label>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Password -->
            <div class="form-floating mb-3 position-relative">
              <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" autocomplete="new-password">
              <label for="password">Password</label>
              <button class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2 toggle-password" type="button"
                data-target="#password"><i class="fas fa-eye"></i></button>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="form-floating mb-3 position-relative">
              <input type="password" name="re_password" id="re_password"
                class="form-control @error('re_password') is-invalid @enderror"
                placeholder="Konfirmasi Password" autocomplete="new-password">
              <label for="re_password">Konfirmasi Password</label>
              <button class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2 toggle-password" type="button"
                data-target="#re_password"><i class="fas fa-eye"></i></button>
              @error('re_password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <!-- Foto Profil -->
            <div class="mb-3">
              <label for="foto" class="form-label" style="color:#65d2ff; text-shadow: 0 0 5px #65d2ff;">Foto Profil</label>
              <input type="file" name="foto" id="foto" class="form-control form-control-sm @error('foto') is-invalid @enderror" accept="image/*" />
              @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <!-- Preview foto profil lama atau preview foto baru -->
              @if(isset($user) && $user->foto)
                <img id="foto-preview" src="{{ asset('storage/' . $user->foto) }}" alt="Preview Foto Profil" />
              @else
                <img id="foto-preview" style="display:none;" alt="Preview Foto Profil" />
              @endif
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between mt-4">
              <a href="/admin/user" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
              </a>
              <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save me-1"></i> Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Toggle password & preview foto -->
<script>
  document.querySelectorAll('.toggle-password').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = document.querySelector(btn.getAttribute('data-target'));
      const icon = btn.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  });

  const fotoInput = document.getElementById('foto');
  const preview = document.getElementById('foto-preview');
  fotoInput.addEventListener('change', function(e) {
    const [file] = this.files;
    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.style.display = 'block';
    } else {
      preview.style.display = 'none';
    }
  });
</script>
