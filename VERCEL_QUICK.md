# ⚡ VERCEL DEPLOY - Quick Guide

## 🚀 DEPLOY SEKARANG (15 Menit)

### Step 1: Install Vercel CLI (2 menit)

```bash
npm install -g vercel
```

### Step 2: Generate APP_KEY (1 menit)

```bash
php artisan key:generate --show
```

Copy hasilnya! Contoh: `base64:abc123def456...`

### Step 3: Push ke GitHub (2 menit)

```bash
git add .
git commit -m "Deploy to Vercel"
git push origin main
```

### Step 4: Deploy via CLI (3 menit)

```bash
# Login
vercel login

# Deploy
vercel

# Jawab pertanyaan:
# Set up and deploy? → Y
# Link to existing project? → N
# Project name? → personal-music
# Directory? → ./
# Override settings? → N

# Deploy production
vercel --prod
```

### Step 5: Add Postgres Database (3 menit)

1. Buka: https://vercel.com/dashboard
2. Klik project **personal-music**
3. Tab **Storage** → **Create Database**
4. Pilih **Postgres** → **Continue**
5. Database created! ✅

### Step 6: Set Environment Variables (2 menit)

Di Vercel dashboard → **Settings** → **Environment Variables**

Tambahkan satu-satu:

```
Name: APP_KEY
Value: base64:abc123... (dari Step 2)

Name: APP_ENV
Value: production

Name: APP_DEBUG
Value: false

Name: LOG_CHANNEL
Value: stderr

Name: DB_CONNECTION
Value: pgsql

Name: CACHE_DRIVER
Value: array

Name: SESSION_DRIVER
Value: cookie
```

**Save** dan **Redeploy**.

### Step 7: Run Migration (2 menit)

```bash
# Pull environment variables dari Vercel
vercel env pull

# Run migration
php artisan migrate --force

# Run seeder
php artisan db:seed --class=MusicCardSeeder --force
```

### Step 8: Done! 🎉

Buka URL Vercel Anda: `https://personal-music-xxx.vercel.app`

---

## ⚠️ MASALAH FOTO & MUSIK

Foto dan musik di folder `public/storage/` **sudah ter-commit** ke git, jadi akan bisa diakses.

Tapi kalau mau update file:
1. Ganti file lokal
2. Commit & push ke GitHub
3. Vercel auto-redeploy

---

## 🐛 TROUBLESHOOTING CEPAT

### Error: "No encryption key"
→ Pastikan `APP_KEY` sudah di-set di Vercel environment variables

### Error: "Database connection failed"
→ Pastikan Postgres database sudah dibuat di Vercel Storage

### Error: "500 Internal Server Error"
→ Set `APP_DEBUG=true` di Vercel untuk lihat error detail

### Foto tidak muncul
→ Pastikan file sudah di-commit dan push ke GitHub

### Loading sangat lambat
→ Normal! Vercel punya cold start 2-5 detik di request pertama

---

## 📝 COMMAND REFERENCE

```bash
# Deploy
vercel

# Deploy production
vercel --prod

# Pull environment variables
vercel env pull

# View logs
vercel logs

# View deployments
vercel ls

# Remove project
vercel remove personal-music
```

---

## ✅ CHECKLIST

- [ ] Vercel CLI installed
- [ ] APP_KEY generated
- [ ] Pushed to GitHub
- [ ] Deployed via `vercel --prod`
- [ ] Postgres database added
- [ ] Environment variables set
- [ ] Migration run
- [ ] Tested in browser

---

**Total Time: ~15 menit**

**URL: https://personal-music-xxx.vercel.app**

🎉 **DONE!**
