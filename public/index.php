<?php

// public/index.php

// Require Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

// Load the Blade View Factory from the bootstrap file
$viewFactory = require __DIR__ . '/../app/bootstrap.php';

use App\Controllers\HomeController; // Import your controller

// Simple Routing (for demonstration purposes)
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Remove query string for routing
$path = strtok($requestUri, '?');

// Default route
if ($path === '/' || $path === '/index.php') {
    $controller = new HomeController($viewFactory);
    echo $controller->index();
}else {
    // Basic 404 handler
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>The page you requested could not be found.</p>";
}