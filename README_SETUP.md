# Personal Music - Setup Guide

## 📁 Struktur Folder untuk File Lokal

Anda perlu membuat folder dan menyimpan file musik serta foto di dalam struktur berikut:

```
public/
└── storage/
    ├── photos/
    │   ├── person1.jpg
    │   ├── person2.jpg
    │   └── person3.jpg
    └── music/
        ├── song1.mp3
        ├── song2.mp3
        └── song3.mp3
```

## 🚀 Cara Setup

### 1. Buat Folder untuk Photos dan Music

```bash
mkdir public\storage\photos
mkdir public\storage\music
```

### 2. Tambahkan File Anda

- Masukkan foto-foto ke folder `public/storage/photos/`
  - Format yang didukung: JPG, PNG, JPEG
  - Ukuran yang disarankan: 300x300px atau lebih

- Masukkan file musik ke folder `public/storage/music/`
  - Format yang didukung: MP3, WAV, OGG
  - Nama file harus sesuai dengan yang ada di database

### 3. Jalankan Migration

```bash
php artisan migrate
```

### 4. Jalankan Seeder (Data Contoh)

```bash
php artisan db:seed --class=MusicCardSeeder
```

### 5. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser dan akses: `http://localhost:8000`

## 📝 Cara Menambah Data Baru

### Opsi 1: Melalui Database Langsung

Anda bisa menambahkan data langsung ke database menggunakan phpMyAdmin atau tool database lainnya.

Contoh query:

```sql
INSERT INTO music_cards (name, instagram_username, notes, quotes, photo_path, music_path, `order`, created_at, updated_at)
VALUES (
    'Nama Anda',
    'username_ig',
    'Catatan tentang musik ini',
    'Quote favorit Anda',
    '/storage/photos/nama_foto.jpg',
    '/storage/music/nama_musik.mp3',
    4,
    NOW(),
    NOW()
);
```

### Opsi 2: Melalui Laravel Tinker

```bash
php artisan tinker
```

Kemudian jalankan:

```php
App\Models\MusicCard::create([
    'name' => 'Nama Anda',
    'instagram_username' => 'username_ig',
    'notes' => 'Catatan tentang musik ini',
    'quotes' => 'Quote favorit Anda',
    'photo_path' => '/storage/photos/nama_foto.jpg',
    'music_path' => '/storage/music/nama_musik.mp3',
    'order' => 4
]);
```

### Opsi 3: Edit File Seeder

Edit file `database/seeders/MusicCardSeeder.php` dan tambahkan data baru ke array `$musicCards`, kemudian jalankan:

```bash
php artisan db:seed --class=MusicCardSeeder
```

## 🎨 Fitur Aplikasi

- ✅ Card swipeable (geser manual atau otomatis)
- ✅ Tampilkan foto profil
- ✅ Nama dan username Instagram
- ✅ Catatan personal
- ✅ Quotes inspiratif
- ✅ Music player dengan kontrol lengkap
- ✅ Responsive design
- ✅ Autoplay cards (berhenti saat audio diputar)
- ✅ Navigasi dengan tombol prev/next
- ✅ Pagination dots

## 🎵 Format File yang Didukung

### Foto:
- JPG / JPEG
- PNG
- GIF
- WebP

### Music:
- MP3 (recommended)
- WAV
- OGG
- M4A

## 💡 Tips

1. **Ukuran File**: Gunakan file musik dengan ukuran yang tidak terlalu besar (maksimal 10MB) untuk performa yang lebih baik
2. **Nama File**: Gunakan nama file yang jelas dan tanpa spasi (gunakan underscore atau dash)
3. **Order**: Field `order` digunakan untuk mengurutkan card. Semakin kecil angkanya, semakin awal ditampilkan

## 🔧 Troubleshooting

### Foto tidak muncul?
- Pastikan path foto benar: `/storage/photos/nama_file.jpg`
- Cek apakah file benar-benar ada di folder `public/storage/photos/`
- Cek permission folder (harus readable)

### Musik tidak bisa diputar?
- Pastikan path musik benar: `/storage/music/nama_file.mp3`
- Cek apakah file benar-benar ada di folder `public/storage/music/`
- Cek format file (MP3 paling kompatibel)
- Coba buka file musik langsung di browser: `http://localhost:8000/storage/music/nama_file.mp3`

### Data tidak muncul?
- Jalankan: `php artisan migrate:fresh --seed`
- Pastikan database sudah terkonfigurasi dengan benar di file `.env`

## 📱 Mobile Friendly

Aplikasi ini sudah responsive dan bisa diakses dengan baik di:
- Desktop
- Tablet
- Mobile Phone

## 🎭 Customisasi

Anda bisa mengubah tampilan di file:
`resources/views/music-cards/index.blade.php`

- Warna: Ubah gradient di bagian `background: linear-gradient(...)`
- Ukuran card: Ubah `max-width` di class `.card`
- Autoplay delay: Ubah `delay: 5000` di konfigurasi Swiper (dalam milidetik)

Selamat menggunakan Personal Music! 🎵✨
