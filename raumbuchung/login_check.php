<?php
include "db.php";

$vorname  = $_POST['vorname'];
$nachname = $_POST['nachname'];
$passwort = $_POST['passwort'];

$sql = "SELECT * FROM Mitarbeiter WHERE Vorname=? AND Nachname=? AND Passwort=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $vorname, $nachname, $passwort);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    
    $_SESSION['mitarb_nr'] = $user['Nummer'];
    $_SESSION['name'] = $user['Vorname'] . " " . $user['Nachname'];
    
    header("Location: index.php");
} else {
    echo "Login fehlgeschlagen!";
    echo "<a href=index.php>Zurück zum Login</a>;"
}
?>
