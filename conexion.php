<?php
// Los datos de conexión vienen de las variables de entorno (Render).
// No hay contraseñas escritas en el código.
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$name = getenv('DB_NAME');

// Aiven exige conexión cifrada: sslmode=require
$dsn = "pgsql:host=$host;port=$port;dbname=$name;sslmode=require";

try {
    $conexion = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $ex) {
    die("Error de conexión: " . $ex->getMessage());
}
