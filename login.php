<?php
$title = 'Login Page';
include 'header.inc';
include 'menu.inc';
// Check if there's an error message from the authentication process
session_start();
if ($_SESSION['numberOfLogins'] == -1) {
    header("Location: index.php");
  }
?>
<!-- Login form -->
<body>
    <h2>Login</h2>
    <form action="processUsers.php" method="POST" class = "login" >
        <fieldset>
        <label for="userName">Username:</label>
        <input type="text" id="userName" name="userName" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
        </fieldset>
        
    </form>
</body>
</html>
<?php 
if (isset($_GET['error'])) {
    echo "<p style='color: red;'>".$_GET['error']."</p>";
}
?>