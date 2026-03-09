<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;
    private static array $config = [];

    public static function setConfig(array $config): void
    {
        self::$config = $config['database'] ?? $config;
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $c = self::$config;

            // DB connection info
            $host = $c['host'] ?? 'database-2.c5syookmyus3.eu-north-1.rds.amazonaws.com';
            $dbname = $c['dbname'] ?? 'webdev_agency';
            $user = $c['user'] ?? 'admin';
            $pass = $c['pass'] ?? 'baghaztaha12345';
            $charset = $c['charset'] ?? 'utf8mb4';

            // DSN with port 3306 explicitly
            $dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=$charset";

            try {
                self::$instance = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                // If connection fails, show error clearly
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
