<?php

$host = 'database-2.c5syookmyus3.eu-north-1.rds.amazonaws.com';
$port = 3306;
$db   = 'mysql'; // بدلو باسم DB ديالك من بعد
$user = 'admin';
$pass = 'PASSWORD_DIAl_RDS';

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    echo "✅ PHP + Apache + RDS خدامين مزيان";

} catch (PDOException $e) {
    echo "❌ PDO error: " . $e->getMessage();
}
