# 🚀 PANDUAN DEPLOY - Personal Music Laravel

## ⚠️ PENTING: Vercel untuk Laravel

Vercel **TIDAK DIREKOMENDASIKAN** untuk Laravel karena:
- ❌ Vercel dibuat untuk static sites & serverless functions
- ❌ Laravel butuh PHP server yang persistent
- ❌ Database MySQL tidak bisa jalan di Vercel
- ❌ File upload tidak persistent (hilang setelah redeploy)
- ❌ Performance kurang optimal

### ✅ REKOMENDASI HOSTING TERBAIK UNTUK LARAVEL:

---

## 🎯 OPSI 1: RAILWAY (RECOMMENDED - GRATIS)

Railway sangat cocok untuk Laravel, mudah setup, dan punya free tier.

### Setup Railway:

1. **Daftar di Railway:**
   - Kunjungi: https://railway.app
   - Sign up dengan GitHub

2. **Install Railway CLI:**
```bash
npm i -g @railway/cli
```

3. **Login:**
```bash
railway login
```

4. **Initialize Project:**
```bash
railway init
```

5. **Deploy:**
```bash
railway up
```

6. **Add MySQL Database:**
   - Di Railway dashboard, klik "New" → "Database" → "MySQL"
   - Railway akan otomatis set environment variables

7. **Setup Environment Variables:**
   Di Railway dashboard, tambahkan:
   ```
   APP_NAME="Personal Music"
   APP_ENV=production
   APP_KEY=base64:YOUR_KEY_HERE
   APP_DEBUG=false
   APP_URL=https://your-app.railway.app
   
   DB_CONNECTION=mysql
   DB_HOST=${{MYSQLHOST}}
   DB_PORT=${{MYSQLPORT}}
   DB_DATABASE=${{MYSQLDATABASE}}
   DB_USERNAME=${{MYSQLUSER}}
   DB_PASSWORD=${{MYSQLPASSWORD}}
   ```

8. **Generate APP_KEY:**
```bash
php artisan key:generate --show
```
Copy hasilnya ke Railway environment variables.

9. **Run Migration:**
   Di Railway, buka service → Settings → Deploy → Add Command:
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=MusicCardSeeder --force
   ```

10. **Upload Files:**
    - Upload foto & musik ke folder `public/storage/`
    - Commit dan push ke GitHub
    - Railway akan auto-deploy

### Railway Advantages:
- ✅ **GRATIS** untuk personal projects
- ✅ MySQL included
- ✅ Auto-deploy dari GitHub
- ✅ Easy setup (5 menit)
- ✅ Support PHP & Laravel native
- ✅ Persistent storage

---

## 🎯 OPSI 2: HEROKU (MUDAH TAPI BERBAYAR)

Heroku adalah salah satu yang paling populer untuk Laravel.

### Setup Heroku:

1. **Install Heroku CLI:**
```bash
# Windows (via npm)
npm install -g heroku
```

2. **Login:**
```bash
heroku login
```

3. **Create App:**
```bash
heroku create personal-music-app
```

4. **Add Buildpack:**
```bash
heroku buildpacks:set heroku/php
```

5. **Add MySQL (ClearDB):**
```bash
heroku addons:create cleardb:ignite
```

6. **Get Database URL:**
```bash
heroku config:get CLEARDB_DATABASE_URL
```

7. **Set Environment Variables:**
```bash
heroku config:set APP_KEY=$(php artisan key:generate --show)
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
```

8. **Create Procfile:**
```
web: vendor/bin/heroku-php-apache2 public/
```

9. **Deploy:**
```bash
git add .
git commit -m "Deploy to Heroku"
git push heroku main
```

10. **Run Migration:**
```bash
heroku run php artisan migrate --force
heroku run php artisan db:seed --class=MusicCardSeeder --force
```

### Heroku Pricing:
- 💰 $5-7/month untuk hobby tier
- ✅ Reliable dan stable
- ✅ Good documentation

---

## 🎯 OPSI 3: LARAVEL FORGE + DIGITALOCEAN

Untuk production yang serius.

### Setup:

1. **Daftar Laravel Forge:**
   - https://forge.laravel.com
   - $12/month

2. **Connect DigitalOcean:**
   - Buat akun DigitalOcean
   - Connect ke Forge

3. **Create Server:**
   - Pilih $4-6/month droplet
   - Forge akan auto-setup PHP, MySQL, Nginx

4. **Deploy App:**
   - Connect GitHub repo
   - Forge auto-deploy on push

### Total Cost: ~$16-18/month
### Advantages:
- ✅ Professional setup
- ✅ Full control
- ✅ Best performance
- ✅ Auto SSL
- ✅ Easy scaling

---

## 🎯 OPSI 4: SHARED HOSTING (TERMURAH)

Untuk yang budget sangat terbatas.

### Rekomendasi:
1. **Niagahoster** (Indonesia)
   - Rp 10.000 - 20.000/bulan
   - PHP & MySQL included
   - cPanel included

2. **Hostinger**
   - $2-4/month
   - PHP & MySQL
   - Good for beginners

### Setup Shared Hosting:

1. **Upload via FTP/cPanel File Manager:**
   - Upload semua file ke `public_html/`

2. **Setup Database:**
   - Create MySQL database di cPanel
   - Import atau jalankan migration

3. **Edit .env:**
   ```
   APP_URL=https://yourdomain.com
   DB_HOST=localhost
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_pass
   ```

4. **Setup Public Folder:**
   - Pindahkan isi folder `public/` ke root
   - Edit `index.php` untuk adjust path

5. **Set Permissions:**
   ```bash
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```

---

## 🎯 OPSI 5: VERCEL (JIKA TETAP INGIN)

### ⚠️ Catatan:
- Hanya untuk testing/demo
- Tidak untuk production
- File upload tidak persistent
- Database harus external (PlanetScale, Railway, dll)

### Setup Vercel:

1. **File sudah dibuat:**
   - ✅ `vercel.json`
   - ✅ `api/index.php`
   - ✅ `.vercelignore`

2. **Install Vercel CLI:**
```bash
npm i -g vercel
```

3. **Setup Database External:**
   
   **Opsi A - PlanetScale (MySQL Serverless):**
   ```bash
   # Install CLI
   brew install planetscale/tap/pscale
   
   # Login
   pscale auth login
   
   # Create database
   pscale database create personal-music
   
   # Get connection string
   pscale connect personal-music main
   ```
   
   **Opsi B - Railway MySQL:**
   - Buat project di Railway
   - Add MySQL database
   - Copy connection details

4. **Set Vercel Environment Variables:**
```bash
vercel env add APP_KEY
vercel env add DB_HOST
vercel env add DB_DATABASE
vercel env add DB_USERNAME
vercel env add DB_PASSWORD
```

5. **Deploy:**
```bash
vercel --prod
```

6. **Upload Files (Problem!):**
   - File foto/musik **TIDAK BISA** di upload ke Vercel
   - Harus pakai cloud storage:
     - **AWS S3**
     - **Cloudinary**
     - **Backblaze B2**

### Kenapa Tidak Recommended:
- 🔴 File storage tidak persistent
- 🔴 Cold starts (loading lambat)
- 🔴 Limited execution time
- 🔴 Kompleks setup database
- 🔴 Harus pakai cloud storage untuk file

---

## 📊 PERBANDINGAN HOSTING

| Platform | Harga | Setup | Performance | Best For |
|----------|-------|-------|-------------|----------|
| **Railway** | Gratis/$5 | ⭐⭐⭐⭐⭐ Mudah | ⭐⭐⭐⭐ Bagus | Personal/Small |
| **Heroku** | $5-7/mo | ⭐⭐⭐⭐ Mudah | ⭐⭐⭐⭐ Bagus | Small/Medium |
| **Forge+DO** | $16-18/mo | ⭐⭐⭐ Sedang | ⭐⭐⭐⭐⭐ Excellent | Production |
| **Shared Hosting** | Rp 10k-20k/mo | ⭐⭐⭐ Sedang | ⭐⭐ Cukup | Budget Terbatas |
| **Vercel** | Gratis | ⭐⭐ Sulit | ⭐⭐ Kurang | ❌ Tidak recommended |

---

## 🎯 REKOMENDASI FINAL

### Untuk Anda (Personal Music):

**PILIHAN TERBAIK: RAILWAY**

**Kenapa?**
1. ✅ **GRATIS** untuk start
2. ✅ Setup cuma **5 menit**
3. ✅ MySQL included (gratis)
4. ✅ File storage persistent
5. ✅ Auto-deploy dari GitHub
6. ✅ Support Laravel native
7. ✅ Scaling mudah kalau butuh

### Quick Start Railway:

```bash
# 1. Install Railway CLI
npm i -g @railway/cli

# 2. Login
railway login

# 3. Initialize
railway init

# 4. Deploy
railway up

# 5. Add MySQL
# (Lewat dashboard Railway)

# 6. Done! 🎉
```

---

## 📝 CHECKLIST SEBELUM DEPLOY

- [ ] Generate APP_KEY
- [ ] Set APP_ENV=production
- [ ] Set APP_DEBUG=false
- [ ] Setup database connection
- [ ] Upload foto & musik
- [ ] Run migration
- [ ] Run seeder
- [ ] Test di browser
- [ ] Setup custom domain (optional)

---

## 🆘 TROUBLESHOOTING

### Error: "No application encryption key"
```bash
php artisan key:generate
```

### Error: Database connection failed
- Cek DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- Pastikan database sudah dibuat
- Test connection dulu

### Error: 500 Internal Server Error
- Check log: `storage/logs/laravel.log`
- Set `APP_DEBUG=true` untuk lihat error detail
- Cek permission folder `storage/` dan `bootstrap/cache/`

### Foto/Musik tidak muncul
- Pastikan file di-upload ke server
- Cek path di database benar
- Cek permission folder

---

## 📞 BANTUAN

Jika butuh bantuan lebih lanjut:
1. Pilih platform hosting yang mau dipakai
2. Follow panduan step-by-step
3. Screenshot error jika ada masalah

**Recommendation: Pakai Railway, paling gampang dan gratis!** 🚀

---

## 🔗 LINKS

- Railway: https://railway.app
- Heroku: https://heroku.com
- Laravel Forge: https://forge.laravel.com
- DigitalOcean: https://digitalocean.com
- PlanetScale: https://planetscale.com
- Niagahoster: https://niagahoster.co.id

---

Good luck dengan deployment! 🎉
