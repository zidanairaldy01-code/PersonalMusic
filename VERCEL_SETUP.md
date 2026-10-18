# 🎯 SETUP VERCEL - Langkah Lengkap

## ⚠️ PENTING - Limitasi Vercel untuk Laravel:

1. ❌ **Tidak ada database MySQL built-in** - Harus pakai external
2. ❌ **File storage tidak persistent** - Upload hilang setelah redeploy
3. ⚠️ **Cold start** - Loading pertama lambat
4. ⚠️ **Execution time limit** - Maksimal 10 detik per request

---

## 🛠️ SOLUSI UNTUK DATABASE

### Opsi 1: Vercel Postgres (RECOMMENDED)
Vercel punya Postgres built-in yang gratis.

### Opsi 2: PlanetScale MySQL (Gratis)
MySQL serverless yang cocok untuk Laravel.

### Opsi 3: Supabase (Gratis)
Postgres + Storage + Auth.

**UNTUK TUTORIAL INI, KITA PAKAI VERCEL POSTGRES**

---

## 🚀 LANGKAH-LANGKAH DEPLOY

### Step 1: Install Vercel CLI

```bash
npm install -g vercel
```

### Step 2: Login Vercel

```bash
vercel login
```

Pilih GitHub dan authorize.

### Step 3: Update Database Config untuk Postgres

Edit file `config/database.php`, tambahkan di array `connections`:

```php
'pgsql_vercel' => [
    'driver' => 'pgsql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '5432'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8',
    'prefix' => '',
    'prefix_indexes' => true,
    'search_path' => 'public',
    'sslmode' => 'prefer',
],
```

### Step 4: Update .env untuk Vercel

Buat file `.env.vercel`:

```env
APP_NAME="Personal Music"
APP_ENV=production
APP_KEY=base64:GENERATE_DULU
APP_DEBUG=false
APP_URL=https://your-app.vercel.app

LOG_CHANNEL=stderr
LOG_LEVEL=error

DB_CONNECTION=pgsql_vercel
# Database URL dari Vercel Postgres

CACHE_DRIVER=array
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync

FILESYSTEM_DISK=public
```

### Step 5: Generate APP_KEY

```bash
php artisan key:generate --show
```

Copy hasilnya, nanti paste di Vercel environment variables.

### Step 6: Push ke GitHub

```bash
git add .
git commit -m "Ready for Vercel"
git push origin main
```

### Step 7: Deploy ke Vercel

**Opsi A - Via Web (Mudah):**

1. Buka https://vercel.com/dashboard
2. Klik **"Add New Project"**
3. **Import** repository GitHub (PersonalMusic)
4. **Framework Preset:** Other
5. **Root Directory:** ./
6. **Build Command:** (kosongkan)
7. **Output Directory:** public
8. Klik **"Deploy"**

**Opsi B - Via CLI:**

```bash
# Di folder project
vercel

# Jawab pertanyaan:
# - Set up and deploy? Y
# - Which scope? (pilih account)
# - Link to existing project? N
# - What's your project's name? personal-music
# - In which directory is your code located? ./
# - Want to override the settings? N

# Deploy production
vercel --prod
```

### Step 8: Add Vercel Postgres

1. Di Vercel dashboard → Project → **Storage**
2. Klik **"Create Database"**
3. Pilih **"Postgres"**
4. Klik **"Continue"**
5. Database akan otomatis ter-link ke project

Vercel akan otomatis add environment variables:
- `POSTGRES_URL`
- `POSTGRES_PRISMA_URL`
- `POSTGRES_URL_NON_POOLING`
- dll.

### Step 9: Set Environment Variables

Di Vercel dashboard → Project → **Settings** → **Environment Variables**

Tambahkan:

```
APP_NAME = Personal Music
APP_ENV = production
APP_DEBUG = false
APP_KEY = base64:hasil_dari_generate
APP_URL = https://your-project.vercel.app
LOG_CHANNEL = stderr
DB_CONNECTION = pgsql_vercel
DATABASE_URL = (otomatis dari Postgres)
CACHE_DRIVER = array
SESSION_DRIVER = cookie
QUEUE_CONNECTION = sync
```

### Step 10: Run Migration

Vercel tidak support menjalankan migration otomatis, jadi kita perlu pakai cara lain:

**Opsi A - Via Vercel CLI:**

```bash
# Set environment variables lokal dari Vercel
vercel env pull .env.local

# Link database
php artisan migrate --force

# Seed data
php artisan db:seed --class=MusicCardSeeder --force
```

**Opsi B - Via Script (Advanced):**

Buat file `setup-db.php` di root:

```php
<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

Artisan::call('migrate', ['--force' => true]);
Artisan::call('db:seed', ['--class' => 'MusicCardSeeder', '--force' => true]);

echo "Database setup completed!";
```

Lalu akses: `https://your-app.vercel.app/setup-db.php`

⚠️ **HAPUS FILE INI SETELAH SELESAI!**

---

## 📸 MASALAH FILE STORAGE (FOTO & MUSIK)

Vercel **TIDAK PERSISTENT** untuk file upload. Ada 2 solusi:

### Solusi 1: Hardcode Data di Seeder (Simple)

Pakai URL external untuk foto & musik:

```php
[
    'name' => 'Zen Auladi',
    'photo_path' => 'https://i.imgur.com/abc123.jpg', // Upload ke Imgur
    'music_path' => 'https://cdn.example.com/pulang.mp3', // Upload ke CDN
    'song_title' => 'Pulang - 009',
]
```

**Upload foto ke:**
- Imgur (gratis) - https://imgur.com
- Cloudinary (gratis) - https://cloudinary.com

**Upload musik ke:**
- SoundCloud
- Google Drive (public link)
- Dropbox (public link)

### Solusi 2: Pakai Cloud Storage (Professional)

**Cloudinary (RECOMMENDED):**

1. Daftar: https://cloudinary.com (gratis 25GB)
2. Install package:
```bash
composer require cloudinary/cloudinary_php
```

3. Update seeder:
```php
'photo_path' => 'https://res.cloudinary.com/your-cloud/image/upload/zen.jpg',
'music_path' => 'https://res.cloudinary.com/your-cloud/video/upload/pulang.mp3',
```

### Solusi 3: Commit Files ke Git (Quick Fix)

```bash
# Hapus /public/storage dari .gitignore (sudah dilakukan)
git add public/storage/photos/*
git add public/storage/music/*
git commit -m "Add media files"
git push origin main
```

⚠️ **Masalah:** File akan committed ke git (tidak ideal untuk file besar).

---

## 🔄 UPDATE & REDEPLOY

Setiap kali update code:

```bash
git add .
git commit -m "Update"
git push origin main
```

Vercel akan **auto-deploy** dalam 1-2 menit.

---

## 🐛 TROUBLESHOOTING

### 1. Error: "No application encryption key"

**Solusi:**
```bash
php artisan key:generate --show
```
Tambahkan `APP_KEY` di Vercel environment variables.

### 2. Error: "Database connection failed"

**Cek:**
- Postgres sudah dibuat di Vercel?
- Environment variables `DATABASE_URL` ada?
- Migration sudah jalan?

**Fix:**
```bash
vercel env pull .env.local
php artisan migrate --force
```

### 3. Error: "500 Internal Server Error"

**Debug:**
1. Set `APP_DEBUG=true` di Vercel
2. Redeploy
3. Buka site, lihat error detailnya
4. Set `APP_DEBUG=false` lagi setelah selesai

### 4. Foto/Musik tidak muncul

**Cek:**
- File di folder `public/storage/` sudah commit?
- Path benar?
- Atau pakai URL external (Imgur, Cloudinary)

### 5. Cold Start (Loading Lambat)

**Normal!** Vercel serverless punya cold start 2-5 detik.

**Solusi:**
- Upgrade ke Vercel Pro ($20/bulan) untuk reduce cold start
- Atau pakai Railway/Heroku yang always-on

---

## 📊 VERCEL LIMITS (Free Tier)

- ⏱️ **Execution Time:** 10 detik max per request
- 💾 **Bandwidth:** 100GB/bulan
- 🔄 **Build Time:** 6 jam/bulan
- 📦 **Deployment Size:** 250MB max
- ⚡ **Serverless Function Size:** 50MB max

Cukup untuk personal project!

---

## 💰 BIAYA

**Vercel Free Tier:**
- ✅ Hosting: GRATIS
- ✅ Postgres: GRATIS (256MB storage)
- ✅ Bandwidth: 100GB/bulan
- ✅ Unlimited deployments

**Upgrade ($20/bulan) untuk:**
- Faster cold starts
- More resources
- Priority support

---

## ✅ CHECKLIST DEPLOYMENT

- [ ] Vercel account created
- [ ] Vercel CLI installed (`npm i -g vercel`)
- [ ] Project pushed ke GitHub
- [ ] APP_KEY generated
- [ ] Deploy via web/CLI
- [ ] Postgres database added
- [ ] Environment variables set
- [ ] Migration run
- [ ] Seeder run
- [ ] Files uploaded (git or cloud)
- [ ] Test di browser
- [ ] ✅ DONE!

---

## 🎯 EXPECTED RESULT

Setelah deploy berhasil:
- URL: `https://your-project.vercel.app`
- Loading: 2-5 detik (first load - cold start)
- Loading: <1 detik (subsequent loads)
- Database: Postgres (Vercel)
- Files: From git or CDN

---

## 🔗 USEFUL LINKS

- Vercel Dashboard: https://vercel.com/dashboard
- Vercel Docs: https://vercel.com/docs
- Vercel CLI: https://vercel.com/docs/cli
- Postgres Setup: https://vercel.com/docs/storage/vercel-postgres

---

## 📞 NEXT STEPS

1. Follow step-by-step di atas
2. Deploy!
3. Jika ada error, screenshot dan check troubleshooting section
4. ✅ Enjoy your app on Vercel!

---

**Note:** Vercel untuk Laravel **BISA** tapi **TIDAK OPTIMAL**. Railway tetap lebih mudah dan better performance. Tapi kalau sudah yakin pakai Vercel, ikuti panduan ini! 💪
