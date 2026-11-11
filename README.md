# Adivina el Personaje (MVC)

## Estructura
```
config/database.php      Credenciales de la BD
database/database.sql    Script para crear la BD y la tabla usuarios
app/
  Database.php           Conexión PDO
  helpers.php            e(), url(), asset(), redirigir()
  models/Usuario.php     MODELO  - todo el SQL
  controllers/           CONTROLADORES (Auth, Juego)
  views/                 VISTAS  - solo HTML + variables
public/                  Raíz web
  index.php              Controlador frontal / router (?ruta=...)
  assets/css, js, img    Recursos estáticos
```

## Instalación (WAMP)
1. Importar `database/database.sql` en phpMyAdmin.
2. Copiar la carpeta a `www/` (ej: `C:\wamp64\www\adivina-quien`).
3. Abrir `http://localhost/adivina-quien/public/`.

## Rutas
`menu` · `juego` · `login` · `registro` · `logout` · `guardar-victoria` (POST, AJAX)
