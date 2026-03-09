<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO(
        "mysql:host=database-2.c5syookmyus3.eu-north-1.rds.amazonaws.com;port=3306;dbname=mysql;charset=utf8mb4",
        "admin",
        "baghaztaha12345",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    echo "DB CONNECTED OK";
} catch (PDOException $e) {
    echo $e->getMessage();
}
