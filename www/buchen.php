<?php
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $raum  = $_POST['raum'];
    $datum = $_POST['datum'];
    $von   = $_POST['von'];
    $bis   = $_POST['bis'];

    $sql = "INSERT INTO Buchung (RaumNr, MitarbNr, Datum, Zeitslot) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $raum, $datum, $von, $bis);
    $stmt->execute();

    echo "Raum erfolgreich gebucht!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Raum buchen</title>
</head>
<body>

<h2>Raum buchen</h2>

<form method="post">
    Raum:<br>
    <input type="text" name="raum" required><br><br>

    Datum:<br>
    <input type="date" name="datum" required><br><br>

    Von:<br>
    <input type="time" name="von" required><br><br>

    Bis:<br>
    <input type="time" name="bis" required><br><br>

    <button type="submit">Buchen</button>
</form>

<br>
<a href="index.php">Zurück</a>

</body>
</html>
