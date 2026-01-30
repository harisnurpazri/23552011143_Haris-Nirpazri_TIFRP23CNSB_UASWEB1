Enable PHP Zip extension (Windows / Laragon)
===========================================

If you want to enable XLSX export via `phpoffice/phpspreadsheet`, PHP must have the `zip` extension available (ext-zip). On Windows + Laragon the steps are:

1. Locate the active `php.ini` used by your web server and CLI. Common Laragon paths:

   - `C:\laragon\bin\php\php-8.2.29\php.ini`
   - or check `php --ini` in the terminal to see the loaded configuration file.

2. Open the `php.ini` file in a text editor and find the line that mentions `zip`:

   ;extension=zip

   Remove the leading semicolon to enable it:

   extension=zip

3. Save the `php.ini` file and restart Laragon / Apache / php-fpm so the change takes effect.

4. Verify at the command line:

```powershell
php -m | Select-String zip
php -v
```

You should see `zip` listed in the modules output.

5. Install PhpSpreadsheet via Composer:

```powershell
# from project root
composer require phpoffice/phpspreadsheet
```

After composer installs successfully, I can add XLSX export support in `app/Http/Controllers/Admin/OrderController.php` using PhpSpreadsheet. If you prefer, I can implement that export once you confirm `ext-zip` is enabled and `composer require` succeeds.
