<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // Servidor de base de datos (ajusta si es diferente)
$username = "root"; // Usuario de MySQL (ajústalo si es diferente)
$password = ""; // Contraseña (déjalo vacío si no tienes)
$database = "quiz_app"; // Nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$quiz_duration = 300; // Tiempo límite en segundos (ejemplo: 300 segundos = 5 minutos)
?>
