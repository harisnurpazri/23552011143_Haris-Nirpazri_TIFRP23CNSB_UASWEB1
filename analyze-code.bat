@echo off
echo ===============================================
echo           CODE ANALYSIS REPORT
echo ===============================================
echo.
echo [1/3] Running Code Style Analysis...
echo -----------------------------------------------
vendor\bin\pint --test

echo.
echo [2/3] Running Static Analysis...
echo -----------------------------------------------
vendor\bin\phpstan analyse app --level 5

echo.
echo [3/3] Running Tests...
echo -----------------------------------------------
php artisan test

echo.
echo ===============================================
echo           ANALYSIS COMPLETE!
echo ===============================================
pause
