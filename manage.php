<?php
$title = "Search Applicants";
include 'header.inc'; // Include the header
include 'menu.inc'; // Include the menu
include 'settings.php'; // Include the settings file
session_start();
if ($_SESSION['numberOfLogins'] != -1) {
  header("Location: signup.php?error=user_not_logged_in");
}
?>
<body class="manage">
  <br>
  <br>
  <br>
  <br>
  <h1>Search Applicants</h1>
  <form id="search-apply-form" method="GET" action="">
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
  <h1>Sortable Table</h1>
  <table>
    <tr>
        <th>
            Job ID
            <div class="sort-buttons">
                <a href="?sort_column=job_reference&sort_direction=ASC">↑</a>
                <a href="?sort_column=job_reference&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            First Name
            <div class="sort-buttons">
                <a href="?sort_column=first_name&sort_direction=ASC">↑</a>
                <a href="?sort_column=first_name&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Last Name
            <div class="sort-buttons">
                <a href="?sort_column=last_name&sort_direction=ASC">↑</a>
                <a href="?sort_column=last_name&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Gender
            <div class="sort-buttons">
                <a href="?sort_column=gender&sort_direction=ASC">↑</a>
                <a href="?sort_column=gender&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Date of Birth
            <div class="sort-buttons">
                <a href="?sort_column=DOB&sort_direction=ASC">↑</a>
                <a href="?sort_column=DOB&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Email
            <div class="sort-buttons">
                <a href="?sort_column=email&sort_direction=ASC">↑</a>
                <a href="?sort_column=email&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Street Address
            <div class="sort-buttons">
                <a href="?sort_column=street_address&sort_direction=ASC">↑</a>
                <a href="?sort_column=street_address&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Suburb
            <div class="sort-buttons">
                <a href="?sort_column=suburb&sort_direction=ASC">↑</a>
                <a href="?sort_column=suburb&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            State
            <div class="sort-buttons">
                <a href="?sort_column=state&sort_direction=ASC">↑</a>
                <a href="?sort_column=state&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Postcode
            <div class="sort-buttons">
                <a href="?sort_column=postcode&sort_direction=ASC">↑</a>
                <a href="?sort_column=postcode&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Phone Number
            <div class="sort-buttons">
                <a href="?sort_column=phone_number&sort_direction=ASC">↑</a>
                <a href="?sort_column=phone_number&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Primary Skill
            <div class="sort-buttons">
                <a href="?sort_column=skill1&sort_direction=ASC">↑</a>
                <a href="?sort_column=skill1&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Secondary Skill
            <div class="sort-buttons">
                <a href="?sort_column=skill2&sort_direction=ASC">↑</a>
                <a href="?sort_column=skill2&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Other Skills
            <div class="sort-buttons">
                <a href="?sort_column=other_skills&sort_direction=ASC">↑</a>
                <a href="?sort_column=other_skills&sort_direction=DESC">↓</a>
            </div>
        </th>
        <th>
            Status
            <div class="sort-buttons">
                <a href="?sort_column=status&sort_direction=ASC">↑</a>
                <a href="?sort_column=status&sort_direction=DESC">↓</a>
            </div>
        </th>

    </tr>
    <?php

    // Sample logic for fetching and sorting data
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'job_reference';
    $sort_direction = (isset($_GET['sort_direction']) && $_GET['sort_direction'] == 'DESC') ? 'DESC' : 'ASC';
    $search_conditions = [];
    $job_id = isset($_GET['job_id']) ? trim($_GET['job_id']) : '';
    $first_name = isset($_GET['first_name']) ? trim($_GET['first_name']) : '';
    $last_name = isset($_GET['last_name']) ? trim($_GET['last_name']) : '';
    $gender = isset($_GET['gender']) ? trim($_GET['gender']) : '';
    $dob = isset($_GET['dob']) ? trim($_GET['dob']) : '';
    $state = isset($_GET['state']) ? trim($_GET['state']) : '';
    if ($job_id !== '') {
      $search_conditions[] = "job_reference = '" . $conn->real_escape_string($job_id) . "'";
    }
    if ($first_name !== '') {
      $search_conditions[] = "first_name LIKE '%" . $conn->real_escape_string($first_name) . "%'";
    }
    if ($last_name !== '') {
      $search_conditions[] = "last_name LIKE '%" . $conn->real_escape_string($last_name) . "%'";
    }
    if ($gender !== '') {
      $search_conditions[] = "gender = '" . $conn->real_escape_string($gender) . "'";
    }
    if ($dob !== '') {
      $search_conditions[] = "DOB = '" . $conn->real_escape_string($dob) . "'";
    }
    if ($state !== '') {
      $search_conditions[] = "state = '" . $conn->real_escape_string($state) . "'";
    } 
  
    
    // Update sorting based on user request
    if (isset($_GET['sort_column']) && isset($_GET['sort_direction'])) {
        $allowed_columns = ['job_reference', 'first_name', 'last_name', 'genders', 'dob', 'address', 'town', 'postcode', 'state'];
        if (in_array($_GET['sort_column'], $allowed_columns)) {
            $sort_column = $_GET['sort_column'];
        }
        $sort_direction = ($_GET['sort_direction'] === "DESC") ? "DESC" : "ASC";
    }



    $sql = "SELECT * FROM eoi ORDER BY $sort_column $sort_direction";
    if (count($search_conditions) > 0) {
      $sql = "SELECT * FROM eoi WHERE " . implode(" AND ", $search_conditions) . " ORDER BY $sort_column $sort_direction";
    }
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
              <td>" . htmlspecialchars($row['job_reference']) . "</td>
              <td>" . htmlspecialchars($row['first_name']) . "</td>
              <td>" . htmlspecialchars($row['last_name']) . "</td>
              <td>" . htmlspecialchars($row['gender']) . "</td>
              <td>" . htmlspecialchars($row['DOB']) . "</td>
              <td>" . htmlspecialchars($row['email']) . "</td>
              <td>" . htmlspecialchars($row['street_address']) . "</td>
              <td>" . htmlspecialchars($row['suburb']) . "</td>
              <td>" . htmlspecialchars($row['state']) . "</td>
              <td>" . htmlspecialchars($row['postcode']) . "</td>
              <td>" . htmlspecialchars($row['phone_number']) . "</td>
              <td>" . htmlspecialchars($row['skill1']) . "</td>
              <td>" . htmlspecialchars($row['skill2']) . "</td>
              <td>" . htmlspecialchars($row['other_skills']) . "</td>
              <td>" . htmlspecialchars($row['status']) . "</td>
          </tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No records found.</td></tr>";
    }
    ?>
</table>
<form action="update.php" method="POST">
  <fieldset>
  <label for="delete_eoi">Job ID to delete:
    <input type="text" id="delete_eoi" name="delete_eoi" placeholder="ID to delete" maxlength="5">
  </label>
  <label for="eoi_num">EOI Number:
    <input type="text" id="eoi_num" name="eoi_num" placeholder="ID to update" maxlength="5">
  </label>
  <label for="status">Status:
    <select name="status" id="status">
      <option value="New">New</option>
      <option value="Current">Current</option>
      <option value="Final">Final</option>
    </select>
  </label>
  <input type="submit" value="Update">
  </fieldset>
</form>
</body>
</html>
