<?php
// Check if there's an error message from the authentication process
if (isset($_GET['error'])) {
    echo "<p style='color: red;'>".$_GET['error']."</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Signup</h2>
    <form action="createUsers.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="userName" name="userName" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

        <label for="secretKey">Enter Secret Key:</label><br>
        <input type="password" id="secretKey" name="secretKey" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
