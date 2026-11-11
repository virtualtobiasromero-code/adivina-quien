-- ============================================================
-- Base de datos: adivina_quien
-- Proyecto: Adivina Quién Soy - VS La Máquina
-- ©2025 Grupo C16
-- ============================================================

CREATE DATABASE IF NOT EXISTS adivina_quien
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE adivina_quien;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    victorias INT DEFAULT 0,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;