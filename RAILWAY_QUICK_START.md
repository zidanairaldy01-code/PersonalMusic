# 🚂 RAILWAY QUICK START - 5 Menit Deploy!

## ⚡ Cara Tercepat Deploy Laravel ke Railway

---

## 📋 PERSIAPAN

1. ✅ Kode Laravel sudah siap
2. ✅ Push ke GitHub (wajib!)
3. ✅ Punya akun GitHub

---

## 🚀 LANGKAH DEPLOY (5 MENIT)

### Step 1: Sign Up Railway (1 menit)

1. Kunjungi: **https://railway.app**
2. Klik **"Start a New Project"**
3. Login dengan **GitHub**
4. Authorize Railway

### Step 2: Create New Project (1 menit)

1. Klik **"Deploy from GitHub repo"**
2. Pilih repository **PersonalMusic**
3. Klik **"Deploy Now"**
4. Railway akan otomatis detect Laravel dan build

### Step 3: Add MySQL Database (1 menit)

1. Di project dashboard, klik **"New"**
2. Pilih **"Database"**
3. Pilih **"Add MySQL"**
4. Railway akan create database dan set environment variables otomatis

### Step 4: Set Environment Variables (1 menit)

Klik service Laravel → **Variables** → Add variables:

```bash
APP_NAME=Personal Music
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:GENERATE_INI_DULU
APP_URL=${{RAILWAY_PUBLIC_DOMAIN}}

# Database otomatis ter-set dari MySQL service
DB_CONNECTION=mysql
DB_HOST=${{MYSQLHOST}}
DB_PORT=${{MYSQLPORT}}
DB_DATABASE=${{MYSQLDATABASE}}
DB_USERNAME=${{MYSQLUSER}}
DB_PASSWORD=${{MYSQLPASSWORD}}

# Cache & Session
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

# Log
LOG_CHANNEL=stderr
```

**Generate APP_KEY:**
Di lokal, jalankan:
```bash
php artisan key:generate --show
```
Copy hasilnya (contoh: `base64:abcd1234...`) dan paste ke Railway.

### Step 5: Run Migration (1 menit)

**Opsi A - Via Railway CLI:**

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login
railway login

# Link project
railway link

# Run migration
railway run php artisan migrate --force

# Run seeder
railway run php artisan db:seed --class=MusicCardSeeder --force
```

**Opsi B - Via Web (Lebih Mudah):**

1. Klik service → **Settings**
2. Scroll ke **Deploy**
3. Di **Custom Start Command** tambahkan:
   ```bash
   php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}
   ```
4. Klik **Save**
5. Railway akan redeploy otomatis

### Step 6: Upload Files Foto & Musik

**⚠️ PENTING:** Railway punya persistent disk, jadi file tidak hilang!

**Opsi A - Via Git (Recommended):**
```bash
# Commit foto & musik
git add public/storage/photos/*
git add public/storage/music/*
git commit -m "Add photos and music"
git push origin main
```

Railway akan auto-deploy ulang dengan file baru.

**Opsi B - Via Railway CLI:**
```bash
# Connect
railway link

# Run shell
railway shell

# Upload via scp/sftp (advanced)
```

### Step 7: Generate Public URL

1. Klik service → **Settings**
2. Scroll ke **Networking**
3. Klik **Generate Domain**
4. Railway akan kasih URL: `https://personalmusic-production-xxxx.up.railway.app`

### Step 8: Test! 🎉

Buka URL Railway, seharusnya aplikasi sudah jalan!

---

## 📸 MENAMBAH FOTO & MUSIK KE RAILWAY

### Cara 1: Via Git (Paling Mudah)

```bash
# 1. Pastikan file ada di folder
public/storage/photos/zen.png
public/storage/photos/image.png
public/storage/music/pulang.mp3

# 2. Commit
git add public/storage/*
git commit -m "Add media files"

# 3. Push
git push origin main

# Railway akan auto-deploy!
```

### Cara 2: Via Railway Volume (Persistent)

Railway punya persistent disk, jadi file yang di-upload tidak hilang.

1. Di Railway dashboard → Service → **Volumes**
2. Create volume dan mount ke `/app/public/storage`
3. Upload via Railway CLI atau SFTP

---

## 🔄 UPDATE APLIKASI

Setiap kali push ke GitHub, Railway otomatis deploy ulang!

```bash
# Edit code
# ...

# Commit & push
git add .
git commit -m "Update code"
git push origin main

# Railway auto-deploy! ✨
```

---

## 💰 BIAYA RAILWAY

### Free Tier:
- ✅ $5 credit per bulan (GRATIS)
- ✅ Cukup untuk personal project
- ✅ 512MB RAM, shared CPU
- ✅ MySQL included
- ✅ Auto sleep after inactivity (bisa di-disable)

### Pro Tier ($5/month):
- ✅ No auto-sleep
- ✅ More resources
- ✅ Priority support

**Untuk Personal Music, FREE TIER CUKUP!** 🎉

---

## 🛠️ TROUBLESHOOTING

### 1. Error: "No application encryption key"
**Solusi:**
```bash
# Generate key
php artisan key:generate --show

# Add ke Railway environment variables
APP_KEY=base64:hasil_generate
```

### 2. Error: Database connection failed
**Cek:**
- MySQL service sudah running?
- Environment variables sudah link ke MySQL?
- Refresh deployment

**Fix:**
```bash
# Restart service
railway restart
```

### 3. Error: 500 Internal Server Error
**Debug:**
1. Set `APP_DEBUG=true` di Railway variables
2. Check logs:
   ```bash
   railway logs
   ```
3. Lihat error detailnya

### 4. Migration belum jalan
**Run manual:**
```bash
railway run php artisan migrate --force
railway run php artisan db:seed --class=MusicCardSeeder --force
```

### 5. File foto/musik tidak muncul
**Cek:**
- File sudah di-commit ke git?
- Path benar? `/storage/photos/nama.png`
- Permission ok?

**Fix:**
```bash
# Set permission
railway run chmod -R 755 storage
railway run chmod -R 755 bootstrap/cache
```

---

## 📊 CHECK DEPLOYMENT STATUS

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login
railway login

# Link project
railway link

# Check logs
railway logs

# Check status
railway status

# Run commands
railway run php artisan --version
```

---

## 🎯 CHECKLIST DEPLOYMENT

- [ ] Project di GitHub
- [ ] Railway account created
- [ ] Project deployed
- [ ] MySQL added
- [ ] Environment variables set
- [ ] APP_KEY generated
- [ ] Migration run
- [ ] Seeder run
- [ ] Files uploaded
- [ ] Public domain generated
- [ ] Tested di browser
- [ ] ✅ DONE!

---

## 🔗 USEFUL LINKS

- **Railway Dashboard:** https://railway.app/dashboard
- **Railway Docs:** https://docs.railway.app
- **Railway CLI:** https://docs.railway.app/develop/cli
- **Railway Status:** https://status.railway.app

---

## 💡 TIPS

1. **Auto-Deploy:** Railway otomatis deploy setiap push ke GitHub
2. **Environment Variables:** Bisa di-manage di dashboard
3. **Logs:** Real-time logs tersedia di dashboard
4. **Rollback:** Bisa rollback ke deployment sebelumnya
5. **Custom Domain:** Bisa connect custom domain (domain.com)

---

## 🎓 NEXT STEPS

Setelah deploy berhasil:

1. **Custom Domain:**
   - Beli domain (Niagahoster, Namecheap, dll)
   - Add di Railway → Settings → Domains

2. **SSL Certificate:**
   - Railway otomatis provide SSL (HTTPS)
   - Tidak perlu setup manual

3. **Monitoring:**
   - Cek railway logs reguler
   - Setup uptime monitoring (UptimeRobot)

4. **Backup:**
   - Railway auto-backup database
   - Bisa export manual juga

---

## ✅ KESIMPULAN

Railway adalah **PILIHAN TERBAIK** untuk deploy Laravel:
- ⚡ Deploy cuma 5 menit
- 💰 GRATIS untuk start
- 🚀 MySQL included
- 📦 File persistent
- 🔄 Auto-deploy dari GitHub
- 📊 Easy monitoring

**SELAMAT! Aplikasi Personal Music Anda sekarang ONLINE! 🎉**

---

Need help? Railway punya documentation yang lengkap dan community support!
