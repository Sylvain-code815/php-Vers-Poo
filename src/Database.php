<?php
class Database
{
    private PDO $connection;
    public function __construct(array $config)
    {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            $config['host'], $config['database']
        );
        $this->connection = new PDO($dsn,
            $config['username'], $config['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }
    public function getConnection(): PDO {
        return $this->connection;
    }
}