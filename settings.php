<?php
// Database connection details
$host = 'feenix-mariadb.swin.edu.au'; 
$username = 's105543377';        
$password = '123456';          
$dbname = 'accounts_db';    

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
