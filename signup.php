<?php
// Set the page title
$title = "Signup Page";
include 'header.inc'; // Include the header
include 'menu.inc';   // Include the menu
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
<body >
    <h2>Signup</h2>
    <form action="createUsers.php" method="POST" class="login">
        <fieldset>
        <label for="username">Username:</label>
        <input type="text" id="userName" name="userName" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <label for="secretKey">Enter Secret Key:</label>
        <input type="password" id="secretKey" name="secretKey" required><br>
        <button type="submit">Login</button>
        </fieldset>
    </form>
</body>
</html>
