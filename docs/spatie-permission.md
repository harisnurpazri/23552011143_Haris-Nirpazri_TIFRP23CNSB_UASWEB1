Integrasi spatie/laravel-permission (ringkas)
===========================================

`spatie/laravel-permission` menyediakan role & permission yang matang untuk Laravel.
Langkah singkat untuk mengintegrasikan:

1. Pasang package via composer:

```powershell
# dari root project
composer require spatie/laravel-permission
```

2. Publish konfigurasi & migrasi:

```powershell
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

3. Tambahkan trait `HasRoles` ke model `App\Models\User`:

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    // ...
}
```

4. (Opsional) Seed default roles/permissions di `DatabaseSeeder` atau seeder terpisah.

5. Gunakan middleware di route:

```php
Route::middleware(['role:admin'])->group(function() {
    // admin-only routes
});
```

Catatan keamanan & operasi:
- Pastikan Anda melakukan `composer require` di lingkungan pengembangan dan deploy ke server.
- Jika Anda menggunakan cache permissions, jalankan `php artisan permission:cache-reset` setelah perubahan permission.

Saya tidak akan menginstal package secara otomatis tanpa persetujuan Anda — beri tahu jika mau saya jalankan `composer require` dan men-setup contoh role/permission (butuh waktu & migrasi).