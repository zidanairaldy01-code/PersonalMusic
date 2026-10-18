@echo off
echo ========================================
echo   DEPLOY TO VERCEL - Personal Music
echo ========================================
echo.

echo [1/5] Checking Vercel CLI...
where vercel >nul 2>&1
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Vercel CLI not found!
    echo Please install: npm install -g vercel
    pause
    exit /b 1
)
echo Vercel CLI found!
echo.

echo [2/5] Generating APP_KEY...
php artisan key:generate --show > temp_key.txt
set /p APP_KEY=<temp_key.txt
del temp_key.txt
echo APP_KEY: %APP_KEY%
echo.
echo COPY APP_KEY INI! Akan digunakan di Step 5!
echo.
pause

echo [3/5] Adding files to git...
git add .
echo.

echo [4/5] Committing...
git commit -m "Deploy to Vercel - %date% %time%"
echo.

echo [5/5] Pushing to GitHub...
git push origin main
echo.

echo ========================================
echo   FILES READY!
echo ========================================
echo.
echo NEXT STEPS:
echo 1. Run: vercel --prod
echo 2. Add Postgres database di Vercel dashboard
echo 3. Set environment variables (APP_KEY, dll)
echo 4. Run: vercel env pull
echo 5. Run: php artisan migrate --force
echo 6. Run: php artisan db:seed --class=MusicCardSeeder --force
echo.
echo APP_KEY Anda: %APP_KEY%
echo.
pause
