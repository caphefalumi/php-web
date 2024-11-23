<?php
include 'settings.php'; // Include the settings file
include 'header.inc'; // Include the header

session_start();
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
  echo "Please log in first to see this page.";
  header("Location: login.php");
}
// $sort_column = "job_reference"; // Default column to sort
// $sort_direction = "ASC"; // Default direction
// // Update sorting based on user request
// if (isset($_GET['sort_column']) && isset($_GET['sort_direction'])) {
//     $allowed_columns = ['job_reference', 'first_name', 'last_name', 'genders', 'dob', 'address', 'town', 'postcode', 'state'];
//     if (in_array($_GET['sort_column'], $allowed_columns)) {
//         $sort_column = $_GET['sort_column'];
//     }
//     $sort_direction = ($_GET['sort_direction'] === "DESC") ? "DESC" : "ASC";
// }

// Build the query with sorting
$sql = "SELECT (job_reference, first_name, last_name, DOB, gender, email, street_address, suburb, state, phone_number, skill1, skill2, other_skills, status) FROM eoi ";
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$result = $conn->query($sql);        
if ($result->num_rows > 0){ 
    while ($row = $result->fetch_assoc()):
        echo "<tr>
                <td>" . htmlspecialchars($row['job_reference']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['genders']) . "</td>
                <td>" . htmlspecialchars($row['dob']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
                <td>" . htmlspecialchars($row['town']) . "</td>
                <td>" . htmlspecialchars($row['postcode']) . "</td>
                <td>" . htmlspecialchars($row['state']) . "</td>
            </tr>";
    endwhile;}
else {
    echo "<tr><td colspan='9'>No records found.</td></tr>";
}
    

?>
<body>
  <h1>Search Applications</h1>
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
                    <a href="?sort_column=genders&sort_direction=ASC">↑</a>
                    <a href="?sort_column=genders&sort_direction=DESC">↓</a>
                </div>
            </th>
            <th>
                Date of Birth
                <div class="sort-buttons">
                    <a href="?sort_column=dob&sort_direction=ASC">↑</a>
                    <a href="?sort_column=dob&sort_direction=DESC">↓</a>
                </div>
            </th>
            <th>
                Address
                <div class="sort-buttons">
                    <a href="?sort_column=address&sort_direction=ASC">↑</a>
                    <a href="?sort_column=address&sort_direction=DESC">↓</a>
                </div>
            </th>
            <th>
                Town
                <div class="sort-buttons">
                    <a href="?sort_column=town&sort_direction=ASC">↑</a>
                    <a href="?sort_column=town&sort_direction=DESC">↓</a>
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
                State
                <div class="sort-buttons">
                    <a href="?sort_column=state&sort_direction=ASC">↑</a>
                    <a href="?sort_column=state&sort_direction=DESC">↓</a>
                </div>
            </th>
        </tr>

    </table>

</body>
</html>
?>