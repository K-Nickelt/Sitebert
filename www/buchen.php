<?php
include "db.php";

if (!isset($_SESSION['mitarb_nr'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $raumNr = $_POST['raumNr'];
    $datum  = $_POST['datum'];
    $slot   = $_POST['zeitslot'];
    $mitarb = $_SESSION['mitarb_nr'];

    $sql = "INSERT INTO Buchung (RaumNr, MitarbNr, Datum, Zeitslot)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisi", $raumNr, $mitarb, $datum, $slot);
    
    if ($stmt->execute()) {
        echo "Raum erfolgreich gebucht!";
    } else {
        echo "Fehler: Raum evtl. schon belegt!";
    }
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

    Raum Nummer:<br>
    <input type="number" name="raumNr" required><br><br>

    Datum:<br>
    <input type="date" name="datum" required><br><br>

    Zeitslot (z.B. 1-8):<br>
    <input type="number" name="zeitslot" required><br><br>

    <button type="submit">Buchen</button>

</form>

<br>
<a href="index.php">Zurück</a>

</body>
</html>

