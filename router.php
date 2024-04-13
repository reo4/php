<?php

$routes = [
    '/' => 'controllers/home.php',
    '/login' => 'controllers/login.php',
];

$url = $_SERVER['REQUEST_URI'];

$path = parse_url($url)['path'];


if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    abort();
}
