<?php
include 'header.inc';
include 'menu.inc';
// Check if there's an error message from the authentication process

?>
<body>
    <h2>Login</h2>
    <form action="processUsers.php" method="POST">
        <label for="userName">Username:</label><br>
        <input type="text" id="userName" name="userName" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php 
if (isset($_GET['error'])) {
    echo "<p style='color: red;'>".$_GET['error']."</p>";
}
?>