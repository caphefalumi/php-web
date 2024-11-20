<?php
include 'settings.php';
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}
function sanitize_input($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}
$userName = sanitize_input($_POST['userName']);
$password = sanitize_input($_POST['password']);
$confirmPassword = sanitize_input($_POST['confirmPassword']);
$sql = "SELECT * FROM users WHERE userName = '$userName'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    header("Location: login.php?error=username_taken");
    exit();
}
if ($password != $confirmPassword) {
    header("Location: login.php?error=passwords_do_not_match");
    exit();  // Make sure to stop script execution after redirection
}
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hash the password

$conn->query("INSERT INTO users (userName, password) VALUES ('$userName', '$hasedPassword')");
header("Location: login.php");
exit();
?>