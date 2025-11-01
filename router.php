<?php
/**
 * Router for PHP Built-in Development Server
 *
 * This script mimics Apache's mod_rewrite behavior from .htaccess
 * allowing clean URLs like /home/shop to work with php -S
 *
 * Usage: php -S localhost:8000 router.php
 */

// Get the request URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = urldecode($uri);

// Check if it's a static file (css, js, images, etc.)
if (preg_match('/\.(png|csv|gif|ico|jpg|jpeg|svg|css|js|ttf|woff|woff2|html)$/i', $uri)) {
    // Let PHP serve the static file
    return false;
}

// Convert clean URL to ?sophia= parameter format
// Examples:
//   /home/shop -> ?sophia=home/shop
//   /home/shopus -> ?sophia=home/shopus
//   /admin/login -> ?sophia=admin/login

if ($uri !== '/' && $uri !== '/index.php') {
    // Remove leading slash and convert hyphens to underscores for method names
    $cleanUri = trim($uri, '/');
    // Convert hyphens to underscores (e.g., popup-settings -> popup_settings)
    $cleanUri = str_replace('-', '_', $cleanUri);
    $_GET['sophia'] = $cleanUri;
    $_SERVER['QUERY_STRING'] = 'sophia=' . urlencode($_GET['sophia']);
}

// Load the main application
require __DIR__ . '/index.php';
