<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$app = new App\Core\App();


try {
    $app->run();
} catch (Exception $e) {
   
    echo "Произошла ошибка: " . $e->getMessage();
    error_log($e->getMessage());
}