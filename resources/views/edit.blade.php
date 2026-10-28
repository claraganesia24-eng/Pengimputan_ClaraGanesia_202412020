<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f5f6f2">
    <title>Edit Mahasiswa — Ruang Akademik</title>
    <link rel="stylesheet" href="{{ asset('css/mahasiswa.css') }}">
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <a class="brand" href="{{ url('/mahasiswa') }}" aria-label="Ruang Akademik">
            <span class="brand-mark">ra<span>.</span></span>
            <span class="brand-copy">
                <strong>ruang akademik</strong>
                <small>ADMINISTRASI KAMPUS</small>
            </span>
        </a>

        <div class="sidebar-label">MENU UTAMA</div>
        <nav class="sidebar-nav" aria-label="Navigasi utama">
            <a class="nav-link active" href="{{ url('/mahasiswa') }}" aria-current="page">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Data mahasiswa</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <span class="status-dot"></span>
            <span>
                <strong>Sistem aktif</strong>
                <small>Data tersimpan lokal</small>
            </span>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="breadcrumb"><a href="{{ url('/mahasiswa') }}">Mahasiswa</a><span class="breadcrumb-separator">/</span><strong>Edit data</strong></div>
            <div class="account-chip">
                <span class="account-avatar">A</span>
                <span class="account-name">Administrator</span>
            </div>
        </header>

        <div class="page-content edit-page">
            <section class="page-heading">
                <div>
                    <p class="eyebrow">DIREKTORI MAHASISWA <span>•</span> PERBARUI DATA</p>
                    <h1>Edit data mahasiswa</h1>
                    <p class="page-description">Perbarui informasi {{ $mahasiswa->nama }}.</p>
                </div>
                <a class="button button-light heading-action" href="{{ url('/mahasiswa') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
                    Kembali ke daftar
                </a>
            </section>

            @if ($errors->any())
                <div class="alert alert-error" role="alert">
                    <span class="alert-icon" aria-hidden="true">!</span>
                    <div>
                        <strong>Data belum dapat disimpan.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <section class="edit-layout">
                <article class="panel edit-form-panel">
                    <div class="panel-heading">
                        <div>
                            <p class="eyebrow">INFORMASI PRIBADI</p>
                            <h2>Detail mahasiswa</h2>
                        </div>
                        <span class="panel-step">01</span>
                    </div>
                    <p class="panel-description">Pastikan informasi yang diperbarui sudah benar.</p>

                    <form action="{{ url('/mahasiswa/update/' . $mahasiswa->id) }}" method="POST" class="student-form edit-form">
                        @csrf
                        @method('PUT')

                        <div class="field">
                            <label for="nama">Nama lengkap <span class="required-mark">*</span></label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" autocomplete="name" maxlength="255" required>
                            @error('nama')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label for="jenis_kelamin">Jenis kelamin <span class="required-mark">*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label for="alamat">Alamat <span class="required-mark">*</span></label>
                            <textarea id="alamat" name="alamat" rows="4" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                            @error('alamat')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label for="no_hp">Nomor telepon <span class="required-mark">*</span></label>
                            <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}" autocomplete="tel" inputmode="tel" maxlength="20" required>
                            @error('no_hp')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="button button-primary">
                                Simpan perubahan
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                            </button>
                            <a class="button button-light" href="{{ url('/mahasiswa') }}">Batal</a>
                        </div>
                    </form>
                </article>

                <aside class="edit-aside">
                    <div class="profile-card">
                        <p class="eyebrow">PROFIL SAAT INI</p>
                        <span class="profile-avatar">{{ mb_strtoupper(mb_substr($mahasiswa->nama, 0, 1)) }}</span>
                        <h2>{{ $mahasiswa->nama }}</h2>
                        <span class="gender-badge {{ $mahasiswa->jenis_kelamin === 'Perempuan' ? 'gender-female' : 'gender-male' }}">{{ $mahasiswa->jenis_kelamin }}</span>
                        <div class="profile-divider"></div>
                        <div class="profile-detail">
                            <span>Nomor telepon</span>
                            <strong>{{ $mahasiswa->no_hp }}</strong>
                        </div>
                        <div class="profile-detail">
                            <span>Alamat</span>
                            <strong>{{ $mahasiswa->alamat }}</strong>
                        </div>
                    </div>
                    <div class="tip-card">
                        <span class="tip-mark" aria-hidden="true">i</span>
                        <p>Perubahan akan langsung tersimpan dan terlihat pada daftar mahasiswa.</p>
                    </div>
                </aside>
            </section>
            <footer class="page-footer"><span>Ruang Akademik</span><span>Administrasi data mahasiswa</span></footer>
        </div>
    </main>
</div>
</body>
</html>
