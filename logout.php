<?php
include 'settings.php'; // Include the settings file
include 'header.inc'; // Include the header

if (($_SESSION['loggedin'] == true)) {
    $_SESSION['loggedin'] = false;
    header("Location: login.php");
}
header("Location: login.php");
session_destroy()

?>