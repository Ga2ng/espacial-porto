# Website Espacial Artwork

Website perusahaan untuk Espacial Artwork yang bergerak di bidang Pemetaan, Develop Website, Mobile Apps, dan Consultant IT.

## Teknologi

- **Laravel 12**
- **PHP 8.2.30**
- **Bootstrap 5**
- **MySQL**

## Fitur

- ✅ Homepage dengan hero section dan overview layanan
- ✅ Halaman Layanan (4 layanan utama)
- ✅ Portfolio/Proyek dengan filter kategori
- ✅ Blog dengan search dan kategori
- ✅ Halaman Tentang Kami dengan tim
- ✅ Form Kontak dengan email notification
- ✅ Design professional & corporate
- ✅ Fully responsive
- ✅ SEO optimized dengan meta tags dan sitemap

## Instalasi

1. Clone repository atau extract ke folder web server (XAMPP: `htdocs/espacial`)

2. Install dependencies:
```bash
composer install
```

3. Copy file `.env.example` ke `.env`:
```bash
copy .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=espacial
DB_USERNAME=root
DB_PASSWORD=
```

6. Buat database `espacial` di phpMyAdmin atau MySQL

7. Jalankan migrations dan seeders:
```bash
php artisan migrate
php artisan db:seed
```

8. Buat symbolic link untuk storage:
```bash
php artisan storage:link
```

9. Jalankan server development:
```bash
php artisan serve
```

Website akan tersedia di `http://localhost:8000`

## Struktur Database

### Services
- Layanan utama perusahaan (Pemetaan, Develop Website, Mobile Apps, Consultant IT)

### Projects
- Portfolio proyek yang telah dikerjakan
- Kategori: pemetaan, website, mobile_app, consultant

### Blog Posts
- Artikel blog dengan kategori dan tags

### Contacts
- Pesan dari form kontak

### Teams
- Data tim perusahaan

## Routes

- `/` - Homepage
- `/layanan` - Halaman layanan
- `/proyek` - Portfolio proyek
- `/proyek/{slug}` - Detail proyek
- `/blog` - Daftar artikel blog
- `/blog/{slug}` - Detail artikel
- `/tentang-kami` - Tentang perusahaan
- `/kontak` - Form kontak
- `/sitemap.xml` - Sitemap XML

## Konfigurasi Email

Untuk mengaktifkan email notification dari form kontak, konfigurasi di `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@espacialartwork.com
MAIL_FROM_NAME="Espacial Artwork"
```

## Upload Gambar

Gambar yang diupload akan disimpan di `storage/app/public`. Pastikan symbolic link sudah dibuat dengan:
```bash
php artisan storage:link
```

## License

Copyright © 2026 Espacial Artwork. All rights reserved.
