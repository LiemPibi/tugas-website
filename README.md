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
   - Products: `http://127.0.0.1:8000/products`
   - Add Product: `http://127.0.0.1:8000/products/create`

## Fitur yang tersedia

- ProductController + route group `/products`.
- Minimal 3 kategori produk.
- Total 30 produk.
- Pencarian berdasarkan nama/deskripsi.
- Filter range harga (min & max).
- Pengurutan produk berdasarkan nama/harga.
- Home page dengan tampilan Bootstrap yang lebih menarik.
