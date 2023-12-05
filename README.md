
# Laravel Kasir (PKK)

Aplikasi ini adalah sebuah kasir sederhana yang dibangun dengan menggunakan framework Laravel. Aplikasi ini juga mengintegrasikan Tailwind CSS dan Livewire untuk memberikan pengalaman pengguna yang lebih baik.


## Installation
Berikut adalah langkah-langkah untuk menginstal dan menjalankan aplikasi ini di lingkungan lokal Anda:

1.Salin repositori ini dengan perintah :

```bash
git clone https://github.com/ruriiDev/LaravelKasirPKK.git
```
2.Buka terminal dan masuk ke direktori proyek dengan perintah :

```bash
cd LaravelKasirPKK
```
3.Instal dependensi dengan menjalankan :

```bash
composer install
npm install
```
4.Salin file .env.example menjadi .env, konfigurasikan pengaturan database dan tambahkan kode ini di file .env :

```bash
SCOUT_DRIVER=database
```
5.Generate kunci aplikasi dengan perintah :

```bash
php artisan key:generate
```
6.Jalankan migrasi untuk membuat tabel-tabel yang diperlukan :

```bash
php artisan migrate
```
    
7.Jalankan seeder untuk mengisi data dummy :

```bash
php artisan db:seed

```
8.Mulai server dengan perintah :

```bash
php artisan serve
npm run build
```

9.Buka aplikasi di browser dengan alamat :

```bash
http://127.0.0.1:8000/
```

9.Username dan Password untuk login:

```bash
Username : aau.aah
Password : aauaah

===atau===

Username : haydar
Password : haydar
```
