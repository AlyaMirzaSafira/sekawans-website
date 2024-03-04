# PPP Mo Coba 

Website ini dikembangkan dengan framework Laravel. Aplikasi yang dipasang adalah AdminLTE sebagai template panel Admin Sekawan dan beberapa plugin bawaannya, penggunaan Bootstrap sebagai toolkit frontend, library jQuery, dan beberapa CDN lainnya. Web ini juga mengimplementasikan Progressive Web App dengan Service Worker pada panel Admin.
Asdfghjklqwertyuiop

Package tambahan yang digunakan yaitu:
```bash
composer require ladumor/laravel-pwa
composer require laravel/ui
composer require realrashid/sweet-alert
composer require spatie/laravel-activitylog
npm install chart.js
```

## Instalasi
- Kloning repository Github ke Local
  ```bash
  git clone https://github.com/mhabibb/sekawans-website.git
  ```
- Duplikat file .env.example dan rename menjadi .env. Kemudian memastikan koneksi database pada file .env seperti berikut
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=sekawantb
  DB_USERNAME=root
  DB_PASSWORD=
  ```
- Menginstal dependensi yang ada di composer.json ke dalam folder vendor dan mengoptimasi autoloader
  ```bash
  composer install --optimize-autoloader
  ```
- Menginstal dependensi yang ada di package.json ke dalam folder node_modules
  ```bash
  npm install
  ```
- Menjalankan vite build untuk membangun file Javascript dan SASS ke dalam build di dalam folder public dengan npm
  ```bash
  npm run build
  ```
- Selanjutnya yaitu menjalankan web server dan koneksi ke phpMyAdmin, kemudian membuat database dengan nama yang sama seperti pada file .env 
- Melakukan migrasi database yang tersimpan di folder database sekaligus menjalankan seeding data dan user
  ```bash
  php artisan migrate:fresh –-seed
  ```
  Terdapat 3 user awal yang dapat digunakan untuk login ke panel Admin, dengan satu role Super Admin (terdapat di file DatabaseSeeder.php)
  ```php
  // email asal-asalan
  \App\Models\User::factory()->create([
    'name' => 'Sekawans',
    'email' => 'sekawanjember@gmail.com',
    'role' => true,
  ]);
  \App\Models\User::factory()->create([
      'name' => 'Divisi Komunikasi',
      'email' => 'divkom.sekawan@gmail.com',
  ]);
  \App\Models\User::factory()->create([
      'name' => 'Divisi IT Database',
      'email' => 'itdb.sekawan@gmail.com',
  ]);

  ```
- Menjalankan server local dari project dan aplikasi dapat diakses dengan alamat http://localhost:8000 
  ```bash
  php artisan serve
  ```
