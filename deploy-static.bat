@echo off
echo ========================================
echo   DEPLOY STATIC VERSION (PASTI JALAN!)
echo ========================================
echo.

echo [1/5] Backup Laravel vercel.json...
if exist vercel.json (
    copy vercel.json vercel-laravel-backup.json >nul
    echo Backup created: vercel-laravel-backup.json
)
echo.

echo [2/5] Switch to static vercel.json...
copy vercel-static.json vercel.json >nul
echo Static config activated!
echo.

echo [3/5] Committing changes...
git add .
git commit -m "Deploy static version - No more 500 errors!"
echo.

echo [4/5] Pushing to GitHub...
git push origin main
echo.

echo [5/5] Deploying to Vercel...
vercel --prod
echo.

echo ========================================
echo   DEPLOYMENT COMPLETE!
echo ========================================
echo.
echo Your app is now LIVE with:
echo - Static HTML (no PHP)
echo - No database issues
echo - No 500 errors
echo - Lightning fast loading
echo.
echo To edit data:
echo 1. Open: public\index-static.html
echo 2. Find: const musicCards = [...]
echo 3. Edit your data
echo 4. Run this script again
echo.
echo URL: Check Vercel dashboard
echo.
pause
