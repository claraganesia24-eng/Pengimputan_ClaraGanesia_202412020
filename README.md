# CRUD Penginputan Nama Mahasiswa

## Deskripsi
Project ini merupakan aplikasi CRUD (Create, Read, Update, Delete) berbasis Laravel untuk mengelola data mahasiswa. Aplikasi ini dibuat untuk memenuhi tugas praktikum Laravel.

## Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- HTML dan CSS
- Laragon
- Visual Studio Code

## Database
Nama database: `Lonawine`

Nama tabel: `mahasiswa`

Struktur tabel:
- `id` : Primary key
- `nama` : Nama mahasiswa
- `jenis_kelamin` : Jenis kelamin mahasiswa
- `alamat` : Alamat mahasiswa
- `no_hp` : Nomor HP mahasiswa
- `created_at` : Waktu data dibuat
- `updated_at` : Waktu data diperbarui

Tabel mahasiswa dibuat menggunakan migration Laravel.

## Fitur Aplikasi
1. **Create** — Menambahkan data mahasiswa.
2. **Read** — Menampilkan data mahasiswa dalam bentuk tabel.
3. **Update** — Mengubah data mahasiswa melalui halaman edit.
4. **Delete** — Menghapus data mahasiswa.

## Struktur File
- `app/Models/Mahasiswas.php` — Model untuk tabel mahasiswa.
- `app/Http/Controllers/MahasiswaController.php` — Controller untuk mengelola proses CRUD.
- `database/migrations/` — File migration untuk membuat tabel mahasiswa.
- `resources/views/index.blade.php` — Halaman input dan daftar data mahasiswa.
- `resources/views/edit.blade.php` — Halaman untuk mengubah data mahasiswa.
- `routes/web.php` — Pengaturan route aplikasi.

## Cara Menjalankan Aplikasi

### 1. Menjalankan Laragon
Buka Laragon, kemudian klik **Start All** untuk menjalankan Apache dan MySQL.

### 2. Mengatur Database
Buka phpMyAdmin dan buat database dengan nama `Lonawine`.

### 3. Mengatur Koneksi Database
Buka file `.env` di folder utama project, lalu sesuaikan konfigurasi berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Lonawine
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_PASSWORD` dengan kata sandi MySQL yang digunakan.

### 4. Menjalankan Migration
Buka terminal di folder project, lalu jalankan:

```bash
php artisan config:clear
php artisan migrate
```

### 5. Menjalankan Server Laravel
Jalankan perintah:

```bash
php artisan serve
```

### 6. Membuka Aplikasi
Buka browser dan akses alamat berikut:

http://127.0.0.1:8000/mahasiswa

## Cara Menggunakan Aplikasi
1. Isi formulir data mahasiswa yang tersedia.
2. Klik tombol **Simpan Data** untuk menambahkan data.
3. Data yang berhasil disimpan akan muncul pada tabel mahasiswa.
4. Klik **Edit** untuk mengubah data mahasiswa.
5. Klik **Hapus** untuk menghapus data mahasiswa.

## Kesimpulan
Aplikasi CRUD Penginputan Nama Mahasiswa dibuat menggunakan Laravel dan MySQL untuk mempermudah proses pengelolaan data mahasiswa. Aplikasi ini mendukung proses penambahan, penampilan, pengubahan, dan penghapusan data mahasiswa melalui antarmuka web.
