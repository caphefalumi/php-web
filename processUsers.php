<?php
include 'settings.php';
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function sanitize_input($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}
$userName = sanitize_input($_POST['userName']);
$password = sanitize_input($_POST['password']);

$sql = "SELECT * FROM users WHERE userName = '$userName'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Password is correct, login the user
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $user['userName'];
        header("Location: index.php");
        exit();
    } else {
        // Incorrect password
        header("Location: login.php?error=wrong-password-or-username");
        exit();
    }
} else {
    // User not found
    header("Location: login.php?error=wrong-password-or-username");
    exit();
}
?>