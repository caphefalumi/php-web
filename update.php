<?php
include 'settings.php'; // Include the settings file
$eoi_num = $_POST['eoi_num'];
$status = $_POST['status'];
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$updatesql = "UPDATE eoi SET status = '$status' WHERE EOInumber = '$eoi_num'";
$conn->query($updatesql);
$conn->close();
header("Location: manage.php");
?>