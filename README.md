# website-laravel

## Cara membuka web di Firefox

1. Pastikan sudah berada di folder project:
   ```bash
   cd /workspace/website-laravel
   ```
2. Jalankan server PHP bawaan (contoh di port `8000`):
   ```bash
   php -S 127.0.0.1:8000 -t public
   ```
3. Buka Firefox.
4. Masuk ke alamat berikut:
   - Halaman utama products: `http://127.0.0.1:8000/products`
   - Form tambah produk: `http://127.0.0.1:8000/products/create`

> Jika project ini dijalankan sebagai Laravel penuh (dengan `artisan`), kamu juga bisa pakai:
> ```bash
> php artisan serve --host=127.0.0.1 --port=8000
> ```
> lalu buka URL yang sama di Firefox.
