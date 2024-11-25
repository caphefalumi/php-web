<?php
include 'settings.php'; // Include the settings file
$eoi_num = $_POST['eoi_num'];
$status = $_POST['status'];
$eoi_to_delete = $_POST['delete_eoi'];
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$updatesql = "UPDATE eoi SET status = '$status' WHERE EOInumber = '$eoi_num'";
$delete_eoi = "DELETE FROM eoi WHERE job_reference='$eoi_to_delete'";
//update status and delete eoi
if (isset($eoi_to_delete)) {
  $conn->query($delete_eoi);
}
else {
    echo "Error deleting record: $eoi_to_delete ";
}
if (isset($_POST['eoi_num']) && isset($_POST['status'])) {
    $conn->query($updatesql);
}
$conn->close();
header("Location: manage.php");
?>