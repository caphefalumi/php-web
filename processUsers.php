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

session_start();
if (!isset($_SESSION['numberOfLogins'])) {
    $_SESSION['numberOfLogins'] = 0;
}
$sql = "SELECT * FROM users WHERE userName = '$userName'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $password = hash('sha256', $password);
    if ($password == $user['password']) {
        // Password is correct, login the user
        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['numberOfLogins'] = 0;
        header("Location: index.php");
        exit();
    } else {
        // Incorrect password
        $_SESSION['loggedin'] = false;
        $_SESSION['numberOfLogins']++;
        $t = $_SESSION['numberOfLogins'];
        if ($_SESSION['numberOfLogins'] == 3) {
            header("Location: error.php");
            exit();
        }
        header("Location: login.php?error=$t");
        exit();
    }
} else {
    // User not found
    $_SESSION['loggedin'] = false;
    $_SESSION['numberOfLogins']++;
    $t = $_SESSION['numberOfLogins'];
    header("Location: login.php?error=$t");
    if ($_SESSION['numberOfLogins'] == 3) {
        header("Location: error.php");
        exit();
    }
    exit();
}
?>