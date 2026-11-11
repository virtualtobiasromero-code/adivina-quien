<?php
// Conexión PDO única (patrón singleton simple)
class Database
{
    private static ?PDO $pdo = null;

    public static function get(): PDO
    {
        if (self::$pdo === null) {
            $c   = require __DIR__ . '/../config/database.php';
            $dsn = "mysql:host={$c['host']};dbname={$c['name']};charset={$c['charset']}";
            try {
                self::$pdo = new PDO($dsn, $c['user'], $c['pass'], [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                http_response_code(500);
                die('Error de conexión con la base de datos.');
            }
        }
        return self::$pdo;
    }
}
