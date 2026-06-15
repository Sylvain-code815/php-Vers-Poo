<?php

namespace Parad\PhpPoo;

use PDO;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(array $config): PDO
    {
        if (self::$connection === null) {
            $dbname = $config['database'] ?? $config['dbname'] ?? '';
            $host = $config['host'] ?? 'localhost';
            $user = $config['username'] ?? $config['user'] ?? 'root';
            $password = $config['password'] ?? '';

            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $host, $dbname);

            self::$connection = new PDO(
                $dsn,
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        }

        return self::$connection;
    }
}
