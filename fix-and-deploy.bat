@echo off
echo ========================================
echo   FIX 500 ERROR ^& REDEPLOY TO VERCEL
echo ========================================
echo.

echo [1/4] Adding all files...
git add .
echo Done!
echo.

echo [2/4] Committing changes...
git commit -m "Fix 500 error - Use SQLite with all folders"
echo Done!
echo.

echo [3/4] Pushing to GitHub...
git push origin main
echo Done!
echo.

echo [4/4] Deploying to Vercel...
vercel --prod
echo Done!
echo.

echo ========================================
echo   DEPLOYMENT COMPLETE!
echo ========================================
echo.
echo IMPORTANT: Set these in Vercel Environment Variables:
echo.
echo APP_KEY = base64:R5erY7EdrZEWEerAdNPItuagDlmIkW6U9pRVDNS/9lk=
echo APP_DEBUG = true
echo DB_CONNECTION = sqlite
echo DB_DATABASE = /tmp/database.sqlite
echo SESSION_DRIVER = array
echo CACHE_DRIVER = array
echo.
echo Then REDEPLOY from Vercel dashboard!
echo.
pause
