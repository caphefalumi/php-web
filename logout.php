<?php
include 'settings.php'; // Include the settings file
include 'header.inc'; // Include the header
// Destroy the session
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit()
?>