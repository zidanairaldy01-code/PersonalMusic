# 🔧 FIX 500 ERROR - Vercel

## ✅ Yang Sudah Diperbaiki:

1. ✅ **vercel.json** updated - Pakai SQLite, enable debug
2. ✅ **database.sqlite** created - Database lokal yang bisa commit
3. ✅ **APP_DEBUG=true** - Untuk lihat error detail
4. ✅ **DB_CONNECTION=sqlite** - Lebih simple dari Postgres
5. ✅ **.env.production** - Environment variables untuk Vercel
6. ✅ **Migration & Seeder** - Database sudah terisi

---

## 🚀 REDEPLOY SEKARANG

### Step 1: Commit Changes

```bash
git add .
git commit -m "Fix 500 error - Use SQLite"
git push origin main
```

### Step 2: Update Vercel Environment Variables

Di Vercel dashboard → Settings → Environment Variables, **UPDATE/ADD**:

```
APP_KEY = base64:R5erY7EdrZEWEerAdNPItuagDlmIkW6U9pRVDNS/9lk=
APP_ENV = production
APP_DEBUG = true
APP_URL = https://your-project.vercel.app
LOG_CHANNEL = stderr
DB_CONNECTION = sqlite
DB_DATABASE = /tmp/database.sqlite
CACHE_DRIVER = array
SESSION_DRIVER = array
QUEUE_CONNECTION = sync
VIEW_COMPILED_PATH = /tmp/views
```

**PENTING:** Pastikan `APP_KEY` persis sama!

### Step 3: Redeploy

**Opsi A - Via Dashboard:**
1. Vercel Dashboard → Deployments
2. Klik tiga titik (...) di deployment terakhir
3. Klik **"Redeploy"**

**Opsi B - Via CLI:**
```bash
vercel --prod
```

### Step 4: Check Logs

Jika masih error:
```bash
vercel logs
```

Atau di dashboard → Deployment → View Function Logs

---

## 🐛 TROUBLESHOOTING

### Masih 500 Error?

#### 1. Cek Error Detail

Karena `APP_DEBUG=true`, sekarang Anda akan melihat error message detail di browser.

Kemungkinan error:

#### Error: "Permission denied"
**Fix:**
```bash
# Set permission lokal
chmod -R 777 storage
chmod -R 777 bootstrap/cache

# Commit & push
git add .
git commit -m "Fix permissions"
git push origin main
```

#### Error: "Class not found"
**Fix:**
```bash
# Update composer autoload
composer dump-autoload

# Commit & push
git add .
git commit -m "Update autoload"
git push origin main
```

#### Error: "No such file or directory"
**Fix:** Biasanya missing files, pastikan semua folder ada:
```bash
# Create missing folders
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p bootstrap/cache

# Create .gitkeep
echo "" > storage/framework/sessions/.gitkeep
echo "" > storage/framework/views/.gitkeep
echo "" > storage/framework/cache/.gitkeep

# Commit
git add .
git commit -m "Add storage folders"
git push origin main
```

#### Error: "Database file not found"
Database SQLite sudah dibuat dan akan ter-commit ke git. Tapi kalau error:

**Check:**
1. File `database/database.sqlite` ada?
2. Sudah commit?
3. Size > 0 bytes?

**Verify:**
```bash
ls -lh database/database.sqlite
```

---

## 📊 VERIFIKASI

### Cek Deployment di Vercel:

1. **Function Logs:**
   - Dashboard → Deployment → View Function Logs
   - Lihat error apa yang muncul

2. **Environment Variables:**
   - Settings → Environment Variables
   - Pastikan `APP_KEY` dan semua variable lain sudah di-set

3. **Source Code:**
   - Deployment → Source
   - Pastikan file `database/database.sqlite` ada

---

## ✅ SETELAH FIX

Setelah redeploy dan fix, aplikasi seharusnya:

✅ Loading (mungkin 2-5 detik first load)  
✅ Tampil halaman card  
✅ Data 10 orang muncul  
✅ Foto bisa dilihat  
✅ Musik bisa diputar  

---

## 🎯 JIKA MASIH ERROR

### Kirim Info Ini:

1. **Error message lengkap** (dari browser atau vercel logs)
2. **Screenshot error**
3. **Vercel logs:**
```bash
vercel logs --follow
```

### Common Issues & Solutions:

| Error | Solusi |
|-------|--------|
| "No encryption key" | Set `APP_KEY` di Vercel env vars |
| "Permission denied" | Commit storage folders dengan proper permissions |
| "Class not found" | Run `composer dump-autoload` |
| "Database error" | Check `database.sqlite` ada dan ter-commit |
| "View not found" | Check `VIEW_COMPILED_PATH=/tmp/views` |
| "Session store error" | Set `SESSION_DRIVER=array` |

---

## 💡 ALTERNATIF: Tanpa Database

Jika database tetap bermasalah, bisa hardcode data di controller:

**Edit:** `app/Http/Controllers/MusicCardController.php`

```php
public function getCards()
{
    // Hardcode data tanpa database
    $musicCards = [
        [
            'id' => 1,
            'name' => 'Zen Auladi',
            'instagram_username' => 'zen_auladi',
            'notes' => 'Bukan Orang Bener Tapi Beneran Orang.',
            'quotes' => 'Dream Keep Me Alive',
            'photo_path' => '/storage/photos/zen.png',
            'music_path' => '/storage/music/pulang.mp3',
            'song_title' => 'Pulang - 009',
            'order' => 1,
        ],
        // ... data lainnya
    ];
    
    return response()->json($musicCards);
}
```

Ini akan bypass database completely.

---

## 📝 CHECKLIST FIX

- [ ] vercel.json updated
- [ ] database.sqlite created & committed
- [ ] Environment variables updated di Vercel
- [ ] APP_KEY di-set dengan benar
- [ ] Redeployed
- [ ] Check logs untuk error
- [ ] Test di browser

---

## 🆘 LAST RESORT

Jika semua gagal, ada 2 opsi:

### Opsi 1: Pakai Railway
Railway lebih mudah dan reliable untuk Laravel.

### Opsi 2: Deploy Static HTML Only
Convert app jadi pure static tanpa backend.

---

**Good luck! Check error logs dan ikuti troubleshooting di atas.** 🚀
