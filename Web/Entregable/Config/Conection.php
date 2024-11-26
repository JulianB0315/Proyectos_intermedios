<?php
$host = 'junction.proxy.rlwy.net:37362';  // o el host que estés utilizando
$dbname = 'Tareas';  // nombre de tu base de datos
$username = 'root';  // tu usuario de la base de datos
$password = 'riBVLjJKTBeHzTEEcpSUnJvsEcgpcwCO';  // tu contraseña

try {
    // Crea la conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configura el modo de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>