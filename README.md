# Tugas GENI

Proyek Laravel ini berisi implementasi RESTful API untuk pengelolaan data Komputer.

## Prasyarat

Pastikan perangkat lunak berikut sudah terinstal di komputer Anda:
- [PHP](https://www.php.net/) (Sesuai versi minimum dari Laravel 11 / PHP 8.2+)
- [Composer](https://getcomposer.org/)
- MySQL / MariaDB (Bisa menggunakan XAMPP atau Laragon)
- [Node.js & NPM](https://nodejs.org/) (Opsional, untuk aset frontend)

## Langkah-langkah Instalasi

Ikuti langkah-langkah di bawah ini untuk mengatur dan menjalankan proyek secara lokal:

### 1. Clone Repositori
```bash
git clone https://github.com/yanzyuyu/tugas-GENI.git
cd tugas-GENI
```

### 2. Install Dependensi PHP
Jalankan perintah ini untuk menginstal semua pustaka yang dibutuhkan oleh Laravel:
```bash
composer install
```

### 3. Install Dependensi Frontend
```bash
npm install
```

### 4. Setup File Konfigurasi (.env)
Salin file konfigurasi bawaan menjadi file `.env` lokal Anda:
```bash
cp .env.example .env
```
*(Untuk pengguna Windows CMD, gunakan perintah: `copy .env.example .env`)*

### 5. Generate Application Key
Buat kunci aplikasi (Application Key) agar session dan enkripsi Laravel dapat berjalan:
```bash
php artisan key:generate
```

### 6. Konfigurasi Database
1. Buat database baru di MySQL (misalnya melalui phpMyAdmin) dengan nama `tugas_geni` (atau nama lain yang Anda inginkan).
2. Buka file `.env` di teks editor, lalu cari dan ubah bagian konfigurasi database agar sesuai dengan server MySQL lokal Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugas_geni
DB_USERNAME=root
DB_PASSWORD=
```
*(Catatan: Secara default di XAMPP, `DB_USERNAME` adalah `root` dan `DB_PASSWORD` dibiarkan kosong).*

### 7. Jalankan Migrasi Database
Buat tabel-tabel yang diperlukan di dalam database (seperti tabel `komputers`):
```bash
php artisan migrate
```

### 8. Menjalankan Server Lokal
Nyalakan server *development* bawaan Laravel:
```bash
php artisan serve
```
Aplikasi kini berjalan dan dapat diakses melalui browser atau Postman di alamat: **`http://127.0.0.1:8000`**

---

## Daftar Endpoint API

Berikut adalah daftar endpoint API yang sudah tersedia dalam aplikasi ini:

- `GET /api/hello` : Menampilkan pesan Hello Dunyo!!
- `GET /api/komputers` : Menampilkan semua data komputer (Index)
- `POST /api/komputers` : Menambah data komputer baru (Store)
- `GET /api/komputers/{id}` : Menampilkan spesifik satu data komputer (Show)
- `PUT/PATCH /api/komputers/{id}` : Memperbarui data komputer (Update)
- `DELETE /api/komputers/{id}` : Menghapus data komputer (Destroy)
