# tugas-website

## Cara menjalankan dan membuka di Firefox

1. Masuk ke folder project:
   ```bash
   cd /workspace/tugas-website
   ```
2. Jalankan server Laravel:
   ```bash
   php artisan serve --host=127.0.0.1 --port=8000
   ```
3. Buka Firefox, lalu akses:
   - Home: `http://127.0.0.1:8000/`
   - Articles: `http://127.0.0.1:8000/articles`
   - Article search: `http://127.0.0.1:8000/articles?search=cari+sesuatu`

## Fitur yang tersedia

- ProductController + route group `/products` tetap tersedia.
- ArticleController + route group `/articles`.
- Seeder artikel baru membuat 3 kategori artikel, 30 artikel memakai Factory/Faker, dan 10-20 komentar acak per artikel memakai Faker.
- Pencarian artikel berdasarkan nama atau isi konten lewat query parameter GET `search`.
- Pengurutan hasil artikel berdasarkan nama A-Z dan Z-A.
- Halaman single artikel `/articles/{slug}` mendukung ubah komentar, menampilkan tanggal perubahan, dan hapus komentar.
- Home page dengan tampilan Bootstrap yang lebih menarik.

## Menjalankan seeder artikel

```bash
php artisan migrate:fresh --seed
```
