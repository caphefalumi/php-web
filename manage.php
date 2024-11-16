<?php
include 'settings.php'; // Include the settings file
include 'header.inc'; // Include the header
?>

<!-- Main Content Section -->
<?php
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result = $conn->query($query);
if (!$result) die($conn->error);
echo "<table border='1'><tr><th>Job ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Date of Birth</th><th>Address</th><th>Town</th><th>Postcode</th><th>State</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["JobID"] . "</td>
    <td>" . $row["firstname"] . "</td>
    <td>" . $row["familyname"] . "</td>
    <td>" . $row["genders"] . "</td>
    <td>" . $row["dob"] . "</td>
    <td>" . $row["address"] . "</td>
    <td>" . $row["town"] . "</td>
    <td>" . $row["postcode"] . "</td>
    <td>" . $row["state"] . "</td>
  </tr>";
}

mysqli_close($conn);
?>