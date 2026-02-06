<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "raumbuchung";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
session_start();
?>
