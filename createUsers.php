<?php
include 'settings.php';
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}
function sanitize_input($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}
// Sanitize and trim input data
$userName = sanitize_input($_POST['userName']);
$password = sanitize_input($_POST['password']);
$hashedpassword = hash('sha256', $password);
$confirmPassword = sanitize_input($_POST['confirmPassword']);
$secretKey = sanitize_input($_POST['secretKey']);
$ssecretKey = 'Y29tcGFueQ==';
$sql = "SELECT * FROM users WHERE userName = '$userName'";
$result = $conn->query($sql);

if ($secretKey != $ssecretKey) {
    header("Location: signup.php?error=unauthorized_access");
    exit();
}
if ($password != $confirmPassword) {
    header("Location: signup.php?error=passwords_do_not_match");
    exit();  // Make sure to stop script execution after redirection
}

if ($result->num_rows > 0) {
    header("Location: signup.php?error=username_taken");
    exit();
}
// Insert the new user into the database
$_SESSION['numberOfLogins'] = 0;
$conn->query("INSERT INTO users (userName, password) VALUES ('$userName', '$hashedpassword')");
header("Location: login.php");
exit();
?>