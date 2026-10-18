# 📋 FORMAT DATA LENGKAP - Personal Music

## ✅ Field Yang Tersedia

| Field | Tipe | Wajib? | Keterangan | Contoh |
|-------|------|--------|------------|--------|
| `name` | String | ✅ Ya | Nama lengkap | "Zen Auladi" |
| `instagram_username` | String | ✅ Ya | Username IG (tanpa @) | "zen_auladi" |
| `notes` | Text | ✅ Ya | Catatan/deskripsi | "Bukan Orang Bener Tapi Beneran Orang" |
| `quotes` | Text | ✅ Ya | Quote/tagline | "Dream Keep Me Alive" |
| `photo_path` | String | ✅ Ya | Path foto | "/storage/photos/zen.png" |
| `music_path` | String | ✅ Ya | Path musik | "/storage/music/pulang.mp3" |
| `song_title` | String | ✅ Ya | Judul lagu | "Pulang - 009" |
| `order` | Integer | ✅ Ya | Nomor urut | 1 |

---

## 📝 CONTOH DATA LENGKAP

### Format di Seeder:

```php
[
    'name' => 'Zen Auladi',
    'instagram_username' => 'zen_auladi',
    'notes' => 'Bukan Orang Bener Tapi Beneran Orang.',
    'quotes' => 'Dream Keep Me Alive',
    'photo_path' => '/storage/photos/zen.png',
    'music_path' => '/storage/music/pulang.mp3',
    'song_title' => 'Pulang - 009',
    'order' => 1,
],
```

---

## 🎯 CARA MENAMBAH DATA BARU

### Step 1: Siapkan File
- **Foto:** Copy ke `public/storage/photos/nama_foto.png`
- **Musik:** Copy ke `public/storage/music/nama_lagu.mp3`

### Step 2: Edit Seeder
Buka: `database/seeders/MusicCardSeeder.php`

Tambahkan data baru di array `$musicCards`:

```php
[
    'name' => 'Nama Anda',
    'instagram_username' => 'username_ig',
    'notes' => 'Catatan tentang lagu ini...',
    'quotes' => 'Quote favorit Anda',
    'photo_path' => '/storage/photos/foto_anda.jpg',
    'music_path' => '/storage/music/lagu_anda.mp3',
    'song_title' => 'Judul Lagu - Artis',
    'order' => 11, // Nomor urut berikutnya
],
```

### Step 3: Jalankan Seeder
```bash
php artisan db:seed --class=MusicCardSeeder
```

---

## 🎨 CONTOH DATA BERBAGAI GENRE

### Pop Indonesia:
```php
[
    'name' => 'Raisa Andriana',
    'instagram_username' => 'raisa6690',
    'notes' => 'Lagu ini selalu mengingatkan saya pada kenangan indah masa lalu.',
    'quotes' => 'Love never ends',
    'photo_path' => '/storage/photos/raisa.jpg',
    'music_path' => '/storage/music/serba-salah.mp3',
    'song_title' => 'Serba Salah - Raisa',
    'order' => 1,
],
```

### Rock/Band:
```php
[
    'name' => 'Ahmad Dhani',
    'instagram_username' => 'ahmaddhaniprast',
    'notes' => 'Musik rock adalah passion saya. Setiap riff gitar membawa energi.',
    'quotes' => 'Rock never dies',
    'photo_path' => '/storage/photos/dhani.jpg',
    'music_path' => '/storage/music/cinta-kan-membawamu.mp3',
    'song_title' => 'Cinta Kan Membawamu Kembali - Dewa 19',
    'order' => 2,
],
```

### Hip Hop/Rap:
```php
[
    'name' => 'Brian Immanuel',
    'instagram_username' => 'richbrian',
    'notes' => 'Hip hop adalah cara saya bercerita tentang kehidupan dan perjuangan.',
    'quotes' => 'Stay humble, hustle hard',
    'photo_path' => '/storage/photos/brian.jpg',
    'music_path' => '/storage/music/glow-like-dat.mp3',
    'song_title' => 'Glow Like Dat - Rich Brian',
    'order' => 3,
],
```

### International Pop:
```php
[
    'name' => 'Sarah Martinez',
    'instagram_username' => 'sarahmartinez',
    'notes' => 'This song reminds me that music knows no boundaries. It connects us all.',
    'quotes' => 'Music is universal',
    'photo_path' => '/storage/photos/sarah.jpg',
    'music_path' => '/storage/music/someone-like-you.mp3',
    'song_title' => 'Someone Like You - Adele',
    'order' => 4,
],
```

### Jazz/Soul:
```php
[
    'name' => 'Andien Aisyah',
    'instagram_username' => 'andienaisyah',
    'notes' => 'Jazz adalah musik jiwa. Setiap improvisasi membawa perasaan berbeda.',
    'quotes' => 'Feel the soul',
    'photo_path' => '/storage/photos/andien.jpg',
    'music_path' => '/storage/music/tentang-kamu.mp3',
    'song_title' => 'Tentang Kamu - Andien',
    'order' => 5,
],
```

---

## 💡 TIPS FORMAT SONG TITLE

### Format 1: Judul - Artis
```
'song_title' => 'Pulang - 009',
'song_title' => 'Serba Salah - Raisa',
'song_title' => 'Somebody I Used To Know - Gotye',
```

### Format 2: Judul feat. Kolaborasi
```
'song_title' => 'Beautiful - Crush feat. IU',
'song_title' => 'See You Again - Wiz Khalifa ft. Charlie Puth',
```

### Format 3: Dengan Tahun
```
'song_title' => 'Bohemian Rhapsody (1975) - Queen',
'song_title' => 'Hotel California (1976) - Eagles',
```

### Format 4: Judul Album
```
'song_title' => 'Bintang - Superman Is Dead (Album: Kuta Rock City)',
'song_title' => 'Laskar Pelangi - Nidji (OST Film)',
```

---

## 📱 DIMANA JUDUL LAGU DITAMPILKAN?

Di halaman web, judul lagu akan muncul di:

```
┌─────────────────────────────────────┐
│  🎵  PERSONAL SOUNDTRACK             │
│  Pulang - 009         [▶]           │
│  Tekan play untuk mendengarkan      │
└─────────────────────────────────────┘
```

---

## 🔄 UPDATE DATA YANG SUDAH ADA

### Jika ingin update data lama:

1. Edit file: `database/seeders/MusicCardSeeder.php`
2. Ubah nilai yang diinginkan
3. Jalankan:
```bash
php artisan db:seed --class=MusicCardSeeder
```

Data lama akan otomatis terhapus dan diganti dengan data baru karena ada `MusicCard::truncate()`.

---

## ❗ TROUBLESHOOTING

### Judul lagu tidak muncul?
**Cek:**
1. Apakah field `song_title` sudah diisi di seeder?
2. Apakah migration sudah dijalankan? (harus ada kolom `song_title` di database)
3. Jalankan: `php artisan migrate:fresh --seed`

### Data lama masih muncul setelah update seeder?
**Solusi:**
```bash
# Hapus semua data dan buat ulang
php artisan migrate:fresh --seed
```

### Field song_title tidak ada di database?
**Solusi:**
```bash
# Drop semua table dan create ulang
php artisan migrate:fresh

# Kemudian isi data
php artisan db:seed --class=MusicCardSeeder
```

---

## 📊 STATUS SAAT INI

✅ **Database sudah siap:**
- Tabel `music_cards` dengan kolom `song_title`

✅ **Seeder sudah lengkap:**
- 10 data dengan judul lagu berbeda-beda

✅ **View sudah update:**
- Judul lagu ditampilkan di section PERSONAL SOUNDTRACK

✅ **Data contoh:**
- Zen Auladi → "Pulang - 009"
- Sarah Johnson → "My Favorite Song"
- Ahmad Rizki → "Journey of Life"
- dll.

---

## 🎯 QUICK REFERENCE

### Tambah 1 Data Baru:

1. Copy foto ke: `public/storage/photos/nama.jpg`
2. Copy musik ke: `public/storage/music/lagu.mp3`
3. Edit seeder, tambah:
```php
[
    'name' => 'Nama',
    'instagram_username' => 'username',
    'notes' => 'Catatan...',
    'quotes' => 'Quote...',
    'photo_path' => '/storage/photos/nama.jpg',
    'music_path' => '/storage/music/lagu.mp3',
    'song_title' => 'Judul Lagu - Artis',
    'order' => 11,
],
```
4. Jalankan: `php artisan db:seed --class=MusicCardSeeder`

### Ganti Judul Lagu:
Edit di seeder:
```php
'song_title' => 'Judul Baru - Artis',
```

Lalu jalankan seeder lagi.

---

Semua field lengkap dan siap digunakan! 🎉
