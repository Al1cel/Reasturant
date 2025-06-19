<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

define('BASE_PATH', dirname(__DIR__));

$router = new \App\Core\Router();

// Маршруты
$router->add('GET', '/', 'HomeController@index');
$router->add('POST', '/auth/login', 'AuthController@login');
$router->add('POST', '/auth/register', 'AuthController@register');
$router->add('GET', '/logout', 'AuthController@logout');
$router->add('GET', '/booking', 'BookingController@index');
$router->add('POST', '/booking', 'BookingController@store');
$router->add('GET', '/menu', 'MenuController@index');
$router->add('GET', '/menu/filter/{category}', 'MenuController@filter');
$router->add('POST', '/contact', 'ContactController@store');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);