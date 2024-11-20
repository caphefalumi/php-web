<?php
// Set the page title
$title = "Login";
include 'header.inc'; // Include the header
include 'menu.inc';   // Include the menu
include 'settings.php'; // Include the settings file
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
// Check if the form was submitted
    // Initialize variables
$message = "";

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get username and password from POST data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $user = mysqli_query($conn, $sql);
        // Verify the username and password
        if ($user && mysqli_num_rows($user) == 1) {
            $message = "Login successful!";
        } else {
            $message = "Invalid username or password.";
        }
    }
?>
<body>
    <form class="login-form" action="login.php" method="POST">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
    </form>
</body>
