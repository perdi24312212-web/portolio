# Portofolio — Laravel + Tailwind CSS

Template portofolio profesional: responsif, dark mode, animasi scroll, filter proyek, dan form kontak (validasi, CSRF, honeypot, rate limit).

## Cara memasang (Laravel 11/12 + Tailwind v4)

1. Buat proyek Laravel baru:
   ```bash
   composer create-project laravel/laravel portfolio
   cd portfolio
   ```
2. Salin semua isi folder ini ke dalam proyek (timpa file yang sama):
   - `config/portfolio.php`
   - `app/Http/Controllers/PortfolioController.php`
   - `app/Http/Controllers/ContactController.php`
   - `routes/web.php`
   - `resources/css/app.css`
   - `resources/js/app.js`
   - `resources/views/layouts/`, `resources/views/partials/`, `resources/views/portfolio.blade.php`
   - `public/images/foto.jpg` (foto profil)
3. Pasang dependensi dan jalankan:
   ```bash
   npm install
   npm run dev          # terminal 1
   php artisan serve    # terminal 2
   ```
   Buka http://localhost:8000

> Laravel 12 sudah menyertakan Tailwind v4 + Vite. Jika memakai Laravel 11 atau versi lama, jalankan
> `npm install tailwindcss @tailwindcss/vite` lalu tambahkan plugin `@tailwindcss/vite` di `vite.config.js`.

## Mengubah isi

Semua teks (nama, tentang, skill, proyek, pengalaman, sosial media) ada di **`config/portfolio.php`**.

- Foto: ganti file `public/images/foto.jpg` (rasio 3:4 portrait paling bagus).
- CV: taruh PDF di `public/files/cv.pdf`, isi `'cv_url' => '/files/cv.pdf'`.
- Warna utama: ubah `--color-brand-*` di `resources/css/app.css`.

## Form kontak

Atur SMTP di `.env` (`MAIL_MAILER`, `MAIL_HOST`, `MAIL_USERNAME`, dst.). Pesan dikirim ke email di `config/portfolio.php`.
Jika email belum diatur, pesan tetap dicatat di `storage/logs/laravel.log`.

## Deploy

```bash
npm run build
php artisan config:cache route:cache view:cache
```
