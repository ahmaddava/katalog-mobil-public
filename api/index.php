<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Helper untuk Vercel: Ubah path storage ke /tmp
// Karena di Vercel, hanya /tmp yang writable
if (!is_dir('/tmp/storage')) {
    mkdir('/tmp/storage', 0777, true);
    mkdir('/tmp/storage/app', 0777, true);
    mkdir('/tmp/storage/framework', 0777, true);
    mkdir('/tmp/storage/framework/cache', 0777, true);
    mkdir('/tmp/storage/framework/sessions', 0777, true);
    mkdir('/tmp/storage/framework/views', 0777, true);
    mkdir('/tmp/storage/logs', 0777, true);
}
if (!is_dir('/tmp/cache')) {
    mkdir('/tmp/cache', 0777, true);
}


// 1. Maintenance Mode
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 2. Autoload
require __DIR__.'/../vendor/autoload.php';

// 3. Bootstrap App
$app = require_once __DIR__.'/../bootstrap/app.php';

// 4. SETTING PATH KHUSUS VERCEL (PENTING!)
$app->useStoragePath('/tmp/storage');

// Override path bootstrap cache agar tidak error "readonly"
// Kita arahkan penulisan cache (packages.php, services.php) ke /tmp
$app->useBootstrapPath('/tmp');

// 5. Handle Request
$app->handleRequest(Request::capture());
