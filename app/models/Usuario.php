<?php
// MODELO: todo el acceso a la tabla `usuarios` vive acá (nada de SQL fuera de esta clase)
require_once __DIR__ . '/../Database.php';

class Usuario
{
    public static function buscarPorNombre(string $nombre): ?array
    {
        $st = Database::get()->prepare('SELECT id, nombre, password FROM usuarios WHERE nombre = ?');
        $st->execute([$nombre]);
        return $st->fetch() ?: null;
    }

    public static function existe(string $nombre, string $email): bool
    {
        $st = Database::get()->prepare('SELECT id FROM usuarios WHERE nombre = ? OR email = ?');
        $st->execute([$nombre, $email]);
        return (bool) $st->fetch();
    }

    public static function crear(string $nombre, string $email, string $passwordPlano): void
    {
        $hash = password_hash($passwordPlano, PASSWORD_DEFAULT);
        $st   = Database::get()->prepare('INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)');
        $st->execute([$nombre, $email, $hash]);
    }

    public static function verificarCredenciales(string $nombre, string $password): ?array
    {
        $u = self::buscarPorNombre($nombre);
        return ($u && password_verify($password, $u['password'])) ? $u : null;
    }

    public static function victorias(int $id): int
    {
        $st = Database::get()->prepare('SELECT victorias FROM usuarios WHERE id = ?');
        $st->execute([$id]);
        return (int) ($st->fetch()['victorias'] ?? 0);
    }

    /** Suma una victoria y devuelve el total actualizado. */
    public static function sumarVictoria(int $id): int
    {
        $st = Database::get()->prepare('UPDATE usuarios SET victorias = victorias + 1 WHERE id = ?');
        $st->execute([$id]);
        return self::victorias($id);
    }
}
