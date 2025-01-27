# Sistem Informasi Klinik

Sistem Informasi Klinik adalah aplikasi web berbasis CodeIgniter 4 untuk mengelola data pasien, dokter, dan rekam medis di klinik.

## Fitur Utama

- Login dan Register Multi-user (Admin, Dokter, User)
- Dashboard dengan statistik grafik
- Manajemen Data Dokter
- Manajemen Data Pasien
- Manajemen Rekam Medis
- Pencarian Data

## Teknologi

- PHP 8.3
- CodeIgniter 4
- MySQL/MariaDB
- Bootstrap 5
- Chart.js

## Cara Instalasi

1. composer create-project codeigniter4/appstarter klinik
2. Install Composer
3. Jalankan `composer install`
4. Copy `env` ke `.env` dan setting database
5. Import database `db_uas.sql`
6. Jalankan `php spark serve`

## Akun Default

1. Admin
   - Username: admin
   - Password: password
2. Dokter
   - Username: dokter1
   - Password: password
3. Staff
   - Username: staff1
   - Password: password

## Penggunaan

1. Login sesuai role
2. Admin dapat mengakses semua fitur
3. Dokter hanya dapat mengakses data pasien dan rekam medis
4. Gunakan menu di navbar untuk navigasi
5. Logout setelah selesai

## Kendala
- setelah login tampilan dashboard nya belum muncul
