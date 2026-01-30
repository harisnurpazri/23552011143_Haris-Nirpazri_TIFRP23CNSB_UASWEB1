<?php

/*
|--------------------------------------------------------------------------
| Code Analysis Configuration
|--------------------------------------------------------------------------
|
| Since `php artisan analyze` isn't available by default in Laravel,
| here are several options for static code analysis in your Laravel project:
|
*/

// Option 1: Laravel Pint (Already installed)
// Use: vendor/bin/pint
// Purpose: PHP code style formatting

// Option 2: PHPStan with Larastan (Recommended)
// Install: composer require --dev nunomaduro/larastan
// Use: vendor/bin/phpstan analyse
// Purpose: Static analysis for type checking and bug detection

// Option 3: PHP_CodeSniffer
// Install: composer require --dev squizlabs/php_codesniffer
// Use: vendor/bin/phpcs
// Purpose: Code style checking

// Option 4: Psalm
// Install: composer require --dev vimeo/psalm
// Use: vendor/bin/psalm
// Purpose: Static analysis with focus on type safety

// Option 5: Built-in Laravel commands for analysis
// php artisan test - Run tests
// php artisan route:list - Analyze routes
// php artisan model:show {model} - Analyze models

/*
|--------------------------------------------------------------------------
| Current Available Analysis Commands
|--------------------------------------------------------------------------
*/

// These commands are available in your Laravel installation:
// php artisan test                    - Run PHPUnit tests
// php artisan route:list              - List all routes
// php artisan model:show User         - Show model information
// vendor/bin/pint                     - Format code style
// php artisan about                   - Show application information

/*
|--------------------------------------------------------------------------
| To Add analyze command with Larastan
|--------------------------------------------------------------------------
*/

// 1. Install Larastan:
//    composer require --dev nunomaduro/larastan

// 2. Create phpstan.neon configuration file

// 3. Add script to composer.json:
//    "scripts": {
//        "analyze": "vendor/bin/phpstan analyse"
//    }

// 4. Then you can use: php artisan analyze or composer analyze
