# ⚡ QUICK FIX 500 ERROR

## 🔥 CARA TERCEPAT (3 MENIT)

### Step 1: Run Script (1 menit)

```bash
fix-and-deploy.bat
```

Script akan otomatis:
- ✅ Commit semua changes
- ✅ Push ke GitHub  
- ✅ Deploy ke Vercel

### Step 2: Set Environment Variables di Vercel (1 menit)

1. Buka: https://vercel.com/dashboard
2. Pilih project Anda
3. Settings → Environment Variables
4. **ADD/UPDATE** ini:

```
APP_KEY = base64:R5erY7EdrZEWEerAdNPItuagDlmIkW6U9pRVDNS/9lk=
APP_DEBUG = true
DB_CONNECTION = sqlite
DB_DATABASE = /tmp/database.sqlite
SESSION_DRIVER = array
CACHE_DRIVER = array
LOG_CHANNEL = stderr
VIEW_COMPILED_PATH = /tmp/views
```

5. **Save**

### Step 3: Redeploy (30 detik)

1. Vercel Dashboard → Deployments
2. Klik **...** (three dots) di deployment terakhir
3. Klik **"Redeploy"**

### Step 4: Test (30 detik)

Buka URL Vercel Anda. Seharusnya sekarang works!

---

## 🎯 YANG SUDAH DIFIX:

✅ Database: Pakai SQLite (lebih simple)  
✅ Database file: Sudah created & committed  
✅ Debug mode: Enabled (bisa lihat error)  
✅ Storage folders: Semua sudah ada  
✅ Session driver: Array (serverless-friendly)  
✅ Cache driver: Array (serverless-friendly)  

---

## 🐛 JIKA MASIH ERROR

### Lihat Error Detail:

Karena `APP_DEBUG=true`, sekarang error akan muncul di browser dengan detail lengkap.

### Check Logs:

```bash
vercel logs
```

### Common Fix:

**Error: "Permission denied"**
```bash
# Di Vercel, permission otomatis handled
# Tapi pastikan .gitkeep ada di folder
```

**Error: "Database not found"**
- Pastikan `database/database.sqlite` ada
- Check di Vercel deployment → Source

**Error: "Class not found"**
```bash
composer dump-autoload
git add .
git commit -m "Update autoload"
git push origin main
```

---

## 📊 EXPECTED RESULT

Setelah fix:

✅ **Status:** 200 OK  
✅ **Loading:** 2-5 detik (cold start)  
✅ **Data:** 10 cards muncul  
✅ **Foto:** Visible  
✅ **Musik:** Playable  

---

## 🆘 MASIH GAGAL?

Baca **FIX_500_ERROR.md** untuk troubleshooting lengkap.

Atau kirim:
1. Screenshot error
2. Vercel logs output
3. URL deployment Anda

---

**Total Time: 3 menit**

**Run:** `fix-and-deploy.bat` → Set Env Vars → Redeploy → Done! ✅
