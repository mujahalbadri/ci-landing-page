# Aplikasi Landing Page dengan Sistem Login - Codeigniter 4

## System Requirement

1. Minimal PHP Versi 7.2
2. Aplikasi web server (XAMPP, MAMP, Laragon, dll)

## Petunjuk Instalasi dan Menjalankan Program

1. Extract file ci-landing-page.zip
2. Buka aplikasi CLI dengan path ./ci-landing-page
3. Ketik <code>composer install</code>
4. Buat database baru dengan nama <code>ci-landing-page</code>
5. Rename file <code>env</code> menjadi <code>.env</code>
6. Konfigurasi database di <code>.env</code> seperti berikut :
   - database.default.hostname = localhost
   - database.default.database = ci-landing-page
   - database.default.username = root
   - database.default.password =
   - database.default.DBDriver = MySQLi
7. Atur CI_ENVIRONMENT=development (jika masih ditahap pengembangan) atau CI_ENVIRONMENT=production (jika sudah ditahap produksi) pada file <code>.env</code>
8. Ketik <code>php spark migrate</code> pada CLI
10. Jalankan <code>php spark serve</code>
