<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Create the application for testing.
     *
     * If the SQLite PDO driver is not available in the current PHP build
     * (common on some Windows/Laragon setups), fall back to a local
     * MySQL connection by setting environment variables at runtime so
     * the tests can still run.
     */
    public function createApplication()
    {
        // If in-memory sqlite is not available, switch to MySQL for tests.
        if (! extension_loaded('pdo_sqlite') && ! extension_loaded('sqlite3')) {
            // Set reasonable defaults for Laragon: adjust if your MySQL differs
            putenv('DB_CONNECTION=mysql');
            putenv('DB_HOST=127.0.0.1');
            putenv('DB_PORT=3306');
            putenv('DB_DATABASE=meubeul_test');
            putenv('DB_USERNAME=root');
            putenv('DB_PASSWORD=');
            // Keep sessions in memory during tests and disable forced HTTPS
            putenv('SESSION_DRIVER=array');
            putenv('FORCE_HTTPS=false');
        }

        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}
