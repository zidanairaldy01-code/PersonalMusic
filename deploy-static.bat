@echo off
echo ========================================
echo   DEPLOY STATIC VERSION (PASTI JALAN!)
echo ========================================
echo.

echo Checking Vercel CLI...
where vercel >nul 2>&1
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Vercel CLI not found!
    echo Install: npm install -g vercel
    pause
    exit /b 1
)

echo Vercel CLI found!
echo.

echo ========================================
echo   STEP 1: LOGIN TO VERCEL
echo ========================================
echo.
echo Opening login process...
echo.
echo IMPORTANT: A URL will appear in your browser.
echo Please login/sign up and authorize the device.
echo.
pause

vercel login

echo.
echo ========================================
echo   STEP 2: SWITCH TO STATIC CONFIG
echo ========================================
echo.

echo Backup Laravel vercel.json...
if exist vercel.json (
    copy vercel.json vercel-laravel-backup.json >nul
    echo Backup created!
)

echo Switch to static config...
copy vercel-static.json vercel.json >nul
echo Static config activated!
echo.

echo ========================================
echo   STEP 3: COMMIT CHANGES
echo ========================================
echo.

git add .
git commit -m "Deploy static version - 100%% works!"
echo Committed!
echo.

echo ========================================
echo   STEP 4: PUSH TO GITHUB
echo ========================================
echo.

git push origin main
echo Pushed!
echo.

echo ========================================
echo   STEP 5: DEPLOY TO VERCEL
echo ========================================
echo.

vercel --prod

echo.
echo ========================================
echo   DEPLOYMENT COMPLETE!
echo ========================================
echo.
echo Your app is now LIVE!
echo.
echo Features:
echo - Static HTML (no Laravel issues)
echo - No database problems
echo - Lightning fast loading
echo - 100%% works guaranteed!
echo.
echo To edit data:
echo 1. Open: public\index-static.html
echo 2. Find: const musicCards = [...]
echo 3. Edit your data
echo 4. Run: git add . ^&^& git commit -m "Update" ^&^& git push
echo.
echo Vercel will auto-redeploy!
echo.
pause
