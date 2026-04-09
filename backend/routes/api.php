<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Process;

// API Routes for Vue.js frontend
Route::get('/user', function (Request $request) {
    return ['user' => 'guest'];
});

// Sample API endpoints
Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello from Laravel API!',
        'timestamp' => now()->toISOString()
    ]);
});

Route::get('/status', function () {
    return response()->json([
        'status' => 'online',
        'laravel_version' => app()->version(),
        'php_version' => PHP_VERSION
    ]);
});

// Sample data endpoint
Route::get('/items', function () {
    return response()->json([
        ['id' => 1, 'name' => 'Sample Item 1', 'price' => 29.99],
        ['id' => 2, 'name' => 'Sample Item 2', 'price' => 39.99],
        ['id' => 3, 'name' => 'Sample Item 3', 'price' => 49.99]
    ]);
});

Route::post('/run-pest-test', function () {
    $result = Process::path(base_path())->run('/opt/homebrew/bin/php ./vendor/bin/pest --testsuite=Browser 2>&1');
 
    return response()->json([
    'success' => $result->successful(),
    'stdout' => $result->output(),
    'stderr' => $result->errorOutput(),
]);
});