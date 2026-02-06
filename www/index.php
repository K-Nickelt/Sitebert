<?php
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$heute = date("Y-m-d");
$sql = "SELECT * FROM buchungen WHERE datum = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $heute);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Raumbelegung heute</title>
</head>
<body>

<h2>Willkommen, <?php echo $_SESSION['user']; ?></h2>
<a href="logout.php">Logout</a>

<h3>Heutige Raumbelegung</h3>

<table border="1">
<tr>
    <th>Raum</th>
    <th>Von</th>
    <th>Bis</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['raum']; ?></td>
    <td><?php echo $row['von']; ?></td>
    <td><?php echo $row['bis']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="buchen.php">
    <button>Raum buchen</button>
</a>

</body>
</html>
