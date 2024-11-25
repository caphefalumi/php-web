<?php
include 'header.inc';
include 'menu.inc';
$title = "Login Page";
// Check if there's an error message from the authentication process

?>
<body >
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