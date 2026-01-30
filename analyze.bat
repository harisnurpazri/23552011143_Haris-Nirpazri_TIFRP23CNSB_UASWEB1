@echo off
echo Running Code Style Analysis...
vendor\bin\pint --test

echo.
echo Running Static Analysis...
vendor\bin\phpstan analyse app --configuration=phpstan-basic.neon

echo.
echo Running Tests...
php artisan test

echo.
echo Analysis Complete!
