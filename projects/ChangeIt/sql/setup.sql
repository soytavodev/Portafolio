-- 1. Creación de la Base de Datos
CREATE DATABASE IF NOT EXISTS conversordd_db;
USE conversordd_db;

-- 2. Tabla de Usuarios (Para futuras ampliaciones)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabla de Historial de Conversiones
-- Aquí guardaremos cada vez que alguien use el conversor
CREATE TABLE IF NOT EXISTS historial (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cantidad_origen DECIMAL(15, 2) NOT NULL,
    moneda_destino VARCHAR(10) NOT NULL,
    resultado_conversion DECIMAL(15, 2) NOT NULL,
    fecha_consulta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Tabla de Tasas (Backup Local)
-- Útil si la API se cae y queremos usar el último valor conocido
CREATE TABLE IF NOT EXISTS tasas_backup (
    codigo_moneda CHAR(3) PRIMARY KEY,
    valor_tasa DECIMAL(15, 6) NOT NULL,
    ultima_actualizacion DATETIME
);


