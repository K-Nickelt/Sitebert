<?php
include "db.php";

if (!isset($_SESSION['mitarb_nr'])) {
    header("Location: login.php");
    exit();
}

$heute = date("Y-m-d");

$sql = "
SELECT B.Datum, B.Zeitslot, R.Nummer
FROM Buchung B
JOIN Raum R ON B.RaumNr = R.Nummer
WHERE B.Datum = ?
ORDER BY B.Zeitslot
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $heute);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Heutige Buchungen</title>
</head>
<body>

<h2>Willkommen, <?php echo $_SESSION['name']; ?></h2>
<a href="logout.php">Logout</a>

<h3>Raumbelegung heute (<?php echo $heute; ?>)</h3>

<table border="1">
<tr>
    <th>Raum</th>
    <th>Zeitslot</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['Nummer']; ?></td>
    <td><?php echo $row['Zeitslot']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="buchen.php">
    <button>Raum buchen</button>
</a>

</body>
</html>
