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
$hashedpassword = hash('sha256', $password);
$secretKey = sanitize_input($_POST['secretKey']);
$ssecretKey = 'Y29tcGFueQ==';
$sql = "SELECT * FROM users WHERE userName = '$userName'";
$result = $conn->query($sql);
if ($secretKey != $ssecretKey) {
    header("Location: singup?error=unauthorized_access");
    exit();
}
if ($password != $confirmPassword) {
    header("Location: singup?error=passwords_do_not_match");
    exit();  // Make sure to stop script execution after redirection
}

if ($result->num_rows > 0) {
    header("Location: singup?error=username_taken");
    exit();
}


$conn->query("INSERT INTO users (userName, password) VALUES ('$userName', '$hashedpassword')");
header("Location: login.php");
exit();
?>