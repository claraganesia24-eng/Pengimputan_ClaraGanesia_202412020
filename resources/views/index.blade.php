<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f5f6f2">
    <title>Direktori Mahasiswa — Ruang Akademik</title>
    <link rel="stylesheet" href="{{ asset('css/mahasiswa.css') }}">
</head>
<body>
@php
    $totalMahasiswa = $mahasiswa->count();
    $jumlahLakiLaki = $mahasiswa->where('jenis_kelamin', 'Laki-laki')->count();
    $jumlahPerempuan = $mahasiswa->where('jenis_kelamin', 'Perempuan')->count();
@endphp

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
                <span class="nav-count">{{ $totalMahasiswa }}</span>
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
            <div class="breadcrumb"><span>Administrasi</span><span class="breadcrumb-separator">/</span><strong>Mahasiswa</strong></div>
            <div class="account-chip">
                <span class="account-avatar">A</span>
                <span class="account-name">Administrator</span>
            </div>
        </header>

        <div class="page-content">
            <section class="page-heading">
                <div>
                    <p class="eyebrow">DATA AKADEMIK <span>•</span> 2026</p>
                    <h1>Data mahasiswa</h1>
                    <p class="page-description">Kelola informasi mahasiswa dalam satu tempat.</p>
                </div>
                <a class="button button-dark heading-action" href="#form-mahasiswa">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
                    Tambah mahasiswa
                </a>
            </section>

            @if (session('success'))
                <div class="alert alert-success" role="status">
                    <span class="alert-icon" aria-hidden="true">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

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

            <section class="stats-grid" aria-label="Ringkasan mahasiswa">
                <article class="stat-card stat-total">
                    <div class="stat-topline"><span>Total mahasiswa</span><span class="stat-symbol">∑</span></div>
                    <div class="stat-number">{{ $totalMahasiswa }}</div>
                    <div class="stat-caption">Data terdaftar</div>
                </article>
                <article class="stat-card">
                    <div class="stat-topline"><span>Laki-laki</span><span class="stat-symbol stat-blue">L</span></div>
                    <div class="stat-number">{{ $jumlahLakiLaki }}</div>
                    <div class="stat-caption">Mahasiswa terdaftar</div>
                </article>
                <article class="stat-card">
                    <div class="stat-topline"><span>Perempuan</span><span class="stat-symbol stat-rose">P</span></div>
                    <div class="stat-number">{{ $jumlahPerempuan }}</div>
                    <div class="stat-caption">Mahasiswa terdaftar</div>
                </article>
            </section>

            <section class="workspace-grid">
                <article class="panel form-panel" id="form-mahasiswa">
                    <div class="panel-heading">
                        <div>
                            <p class="eyebrow">FORMULIR</p>
                            <h2>Tambah data</h2>
                        </div>
                        <span class="panel-step">01</span>
                    </div>
                    <p class="panel-description">Lengkapi informasi dasar mahasiswa di bawah ini.</p>

                    <form action="{{ url('/mahasiswa/store') }}" method="POST" class="student-form">
                        @csrf
                        <div class="field">
                            <label for="nama">Nama lengkap <span class="required-mark">*</span></label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Nadia Putri" autocomplete="name" maxlength="255" required>
                            @error('nama')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label for="jenis_kelamin">Jenis kelamin <span class="required-mark">*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label for="alamat">Alamat <span class="required-mark">*</span></label>
                            <textarea id="alamat" name="alamat" rows="3" placeholder="Jalan, kota, dan kode pos" required>{{ old('alamat') }}</textarea>
                            @error('alamat')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label for="no_hp">Nomor telepon <span class="required-mark">*</span></label>
                            <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xx xxxx xxxx" autocomplete="tel" inputmode="tel" maxlength="20" required>
                            @error('no_hp')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="button button-primary form-submit">
                            Simpan mahasiswa
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                        </button>
                        <p class="form-note"><span class="required-mark">*</span> Wajib diisi</p>
                    </form>
                </article>

                <article class="panel table-panel">
                    <div class="panel-heading table-heading">
                        <div>
                            <p class="eyebrow">DIREKTORI</p>
                            <h2>Daftar mahasiswa <span class="heading-count">{{ $totalMahasiswa }}</span></h2>
                        </div>
                        <span class="updated-label"><span class="status-dot"></span> Data terkini</span>
                    </div>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th class="column-number">NO.</th>
                                    <th>MAHASISWA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>NO. TELEPON</th>
                                    <th class="column-actions">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $mhs)
                                    <tr>
                                        <td class="row-number">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td>
                                            <div class="student-cell">
                                                <span class="student-avatar">{{ mb_strtoupper(mb_substr($mhs->nama, 0, 1)) }}</span>
                                                <span class="student-name">{{ $mhs->nama }}</span>
                                            </div>
                                        </td>
                                        <td><span class="gender-badge {{ $mhs->jenis_kelamin === 'Perempuan' ? 'gender-female' : 'gender-male' }}">{{ $mhs->jenis_kelamin }}</span></td>
                                        <td class="address-cell">{{ $mhs->alamat }}</td>
                                        <td class="phone-cell">{{ $mhs->no_hp }}</td>
                                        <td>
                                            <div class="row-actions">
                                                <a class="action-link" href="{{ url('/mahasiswa/edit/' . $mhs->id) }}">Edit</a>
                                                <form action="{{ url('/mahasiswa/destroy/' . $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-link action-delete">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="empty-state">
                                                <span class="empty-icon" aria-hidden="true">
                                                    <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M20 8v6m-3-3h6"/></svg>
                                                </span>
                                                <strong>Belum ada mahasiswa</strong>
                                                <span>Data yang ditambahkan akan muncul di sini.</span>
                                                <a href="#form-mahasiswa">Tambah data pertama</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($totalMahasiswa > 0)
                        <div class="table-footer">Menampilkan <strong>{{ $totalMahasiswa }}</strong> mahasiswa</div>
                    @endif
                </article>
            </section>
            <footer class="page-footer"><span>Ruang Akademik</span><span>Administrasi data mahasiswa</span></footer>
        </div>
    </main>
</div>
</body>
</html>
