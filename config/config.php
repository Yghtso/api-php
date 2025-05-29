<?php

header("Content-Type: application/json");

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER', '');
define('DB_PASS', '');

function db()
{
    static $pdo;
    if (!$pdo) {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}

spl_autoload_register(function ($class): void {
    $file = __DIR__ . '/../src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file))
        require $file;
});
