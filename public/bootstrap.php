<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', 'database-2.c5syookmyus3.eu-north-1.rds.amazonaws.com');
define('DB_PORT', 3306);
define('DB_NAME', 'webdev_agency');
define('DB_USER', 'admin');
define('DB_PASS', 'baghaztaha12345');

try {
    $GLOBALS['pdo'] = new PDO(
        "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
