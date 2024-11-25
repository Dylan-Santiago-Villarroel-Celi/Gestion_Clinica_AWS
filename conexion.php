<?php
// Configuración de la base de datos
$host = 'clinica.cvhmfndeld5j.us-east-1.rds.amazonaws.com'; // Cambia por el endpoint de tu RDS
$port = 3306;
$dbname = 'clinica';
$username = 'admin';
$password = 'tu_contraseña';

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
