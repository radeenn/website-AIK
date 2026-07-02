@echo off
echo Menghentikan proses Node yang mungkin mengunci node_modules...
taskkill /F /IM node.exe >nul 2>&1
if exist node_modules rmdir /S /Q node_modules
if exist package-lock.json del /F /Q package-lock.json
npm config delete proxy
npm config delete https-proxy
npm config set registry https://registry.npmjs.org/
npm cache verify
npm install --registry=https://registry.npmjs.org/
echo.
echo Jika instalasi berhasil, jalankan: npm run dev
pause
