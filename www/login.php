php
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<form action="login_check.php" method="post">
    Benutzername:<br>
    <input type="text" name="username" required><br><br>

    Passwort:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>
</body>
</html>
