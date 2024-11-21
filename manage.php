<?php
include 'settings.php'; // Include the settings file
include 'header.inc'; // Include the header
?>
<body>
  <h1>Search Applications</h1>
  <form id="search-apply-form" method="GET" action="manage.php">
    <fieldset>
      <legend>Search Criteria</legend>
      
      <!-- Search by Job ID -->
      <label for="job-id">Job ID: 
        <input type="text" id="job-id" name="job_id" pattern="\d{5}" maxlength="5" placeholder="Enter 5-digit Job ID">
      </label>
      <br>

      <!-- Search by First Name -->
      <label for="firstname">First Name: 
        <input type="text" id="first-name" name="first_name" maxlength="20" placeholder="Enter First Name">
      </label>
      <br>

      <!-- Search by Last Name -->
      <label for="familyname">Last Name: 
        <input type="text" id="last-name" name="last_name" maxlength="20" placeholder="Enter Last Name">
      </label>
      <br>

      <!-- Search by Gender -->
      <label>Gender: 
        <select name="gender" id="gender">
          <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="others">Others</option>
        </select>
      </label>
      <br>

      <!-- Search by Date of Birth -->
      <label for="dob">Date of Birth: 
        <input type="date" id="dob" name="dob">
      </label>
      <br>

      <!-- Search by State -->
      <label for="state">State: 
        <select name="state" id="state">
          <option value="">Select</option>
          <option value="VIC">VIC</option>
          <option value="NSW">NSW</option>
          <option value="QLD">QLD</option>
          <option value="NT">NT</option>
          <option value="WA">WA</option>
          <option value="SA">SA</option>
          <option value="TAS">TAS</option>
          <option value="ACT">ACT</option>
        </select>
      </label>
      <br>


      <!-- Search Button -->
      <input type="submit" value="Search">
    </fieldset>
  </form>
</body>
</html>

<!-- Main Content Section -->
<?php
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result = $conn->query("SELECT * FROM eoi");
if (!$result) die($conn->error);
echo "<table border='1'><tr><th>Job ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Date of Birth</th><th>Address</th><th>Town</th><th>Postcode</th><th>State</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["job_reference"] . "</td>
    <td>" . $row["first_name"] . "</td>
    <td>" . $row["last_name"] . "</td>
    <td>" . $row["genders"] . "</td>
    <td>" . $row["dob"] . "</td>
    <td>" . $row["email"] . "</td>
    <td>" . $row["phone_number"] . "</td>
    <td>" . $row["address"] . "</td>
    <td>" . $row["town"] . "</td>
    <td>" . $row["postcode"] . "</td>
    <td>" . $row["state"] . "</td>
  </tr>";
}

mysqli_close($conn);
?>