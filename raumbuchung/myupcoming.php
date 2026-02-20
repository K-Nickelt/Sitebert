<?php
include "db.php";

if (!isset($_SESSION['mitarb_nr'])) {
    header("Location: login.php");
    exit();
}

$heute = date("Y-m-d");
$mitarb_nr = $_SESSION['mitarb_nr']
$sql = "
SELECT B.Datum, B.Zeitslot, R.Nummer
FROM Buchung B
JOIN Raum R ON B.RaumNr = R.Nummer
WHERE B.MitarbNr = ?
AND B.Datum >= ?
ORDER BY B.Zeitslot
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $mitarb_nr, $heute);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deine kommenden Buchungen</title>
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
