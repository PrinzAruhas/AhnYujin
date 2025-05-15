<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow rounded-3">
                <div class="card-body">
                    <h4 class="mb-4"><b>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</b></h4>

                    <form action="{{ isset($user) ? '/admin/user/'.$user->id : '/admin/user' }}" method="POST">
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif

                        <div class="form-group mb-3">
                            <label for="name"><b>Nama Lengkap</b></label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name ?? '') }}"
                                   placeholder="Nama Lengkap">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email"><b>Email</b></label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email ?? '') }}"
                                   placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 position-relative">
                            <label for="password"><b>Password</b></label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password" autocomplete="new-password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                            data-target="#password"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 position-relative">
                            <label for="re_password"><b>Konfirmasi Password</b></label>
                            <div class="input-group">
                                <input type="password" name="re_password" id="re_password"
                                       class="form-control @error('re_password') is-invalid @enderror"
                                       placeholder="Konfirmasi Password" autocomplete="new-password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                            data-target="#re_password"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                            @error('re_password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/admin/user" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script toggle password --}}
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
</script>
