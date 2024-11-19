<?php
include 'settings.php';
// Prevent direct access to the script
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: error.php"); // Redirect to an error page
    exit;
}

// Connect to the database
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize and trim input data
function sanitize_input($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}

// Fetch and sanitize input data
$JobID = sanitize_input($_POST['JobID']);
$firstName = sanitize_input($_POST['first_name']);
$lastName = sanitize_input($_POST['family_name']);
$dob = sanitize_input($_POST['DOB']);
$gender = $_POST['genders'];
$address = sanitize_input($_POST['Address']);
$town = sanitize_input($_POST['Town']);
$state = sanitize_input($_POST['state']);
$postcode = sanitize_input($_POST['Postcode']);
$email = sanitize_input($_POST['Email']);
$phone = sanitize_input($_POST['Phone_number']);
$skills = $_POST['skills'][0];
$otherSkills = sanitize_input($_POST['other_skills']);
echo "Job ID: $JobID<br>
First Name: $firstName<br>
Last Name: $lastName<br>
Date of Birth: $dob<br>
Gender: $gender<br>
Address: $address<br>
Town: $town<br>
State: $state<br>
Postcode: $postcode<br>
Email: $email<br>
Phone: $phone<br>
Skills: $skills<br>
Other Skills: $otherSkills<br>";

// // Array to store error messages
// $errors = [];

// // Server-side Validation:

// // Validate Job Reference Number (exactly 5 digits)
// if (!preg_match('/^\d{5}$/', $JobID)) {
//     $errors[] = "Invalid Job Reference Number. It must be exactly 5 digits.";
// }

// // Validate First Name and Last Name (max 20 alphabetic characters)
// if (!preg_match('/^[a-zA-Z]{1,20}$/', $firstName)) {
//     $errors[] = "Invalid First Name. It should contain only letters (max 20).";
// }
// if (!preg_match('/^[a-zA-Z]{1,20}$/', $lastName)) {
//     $errors[] = "Invalid Last Name. It should contain only letters (max 20).";
// }

// // Validate Date of Birth (age between 15 and 80 years)
// if (!empty($dob)) {
//     $dobTimestamp = strtotime($dob);
//     $currentDate = date("Y-m-d");
//     $age = date_diff(date_create($dob), date_create($currentDate))->y;
//     if ($age < 15 || $age > 80) {
//         $errors[] = "Age must be between 15 and 80 years.";
//     }
// } else {
//     $errors[] = "Date of Birth is required.";
// }

// // Validate Gender (must be selected)
// if (empty($gender)) {
//     $errors[] = "Gender is required.";
// }

// // Validate Address and Town (max 40 characters)
// if (strlen($address) > 40 || strlen($town) > 40) {
//     $errors[] = "Address and Town should not exceed 40 characters.";
// }

// // Validate State (must be one of the predefined values)
// $validStates = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
// if (!in_array($state, $validStates)) {
//     $errors[] = "Invalid state selected.";
// }

// // Validate Postcode (4 digits, matches the state)
// if (!preg_match('/^\d{4}$/', $postcode)) {
//     $errors[] = "Postcode must be exactly 4 digits.";
// }

// // Validate Email Format
// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $errors[] = "Invalid email address.";
// }

// // Validate Phone Number (8 to 12 digits or spaces)
// if (!preg_match('/^(\d\s?){8,12}$/', $phone)) {
//     $errors[] = "Phone number must be 8 to 12 digits.";
// }

// // Validate Skills (at least one checkbox must be selected)
// if (empty($skills)) {
//     $errors[] = "Please select at least one skill.";
// }

// // Display errors if validation fails
// if (!empty($errors)) {
//     echo "<h3>There were errors in your submission:</h3>";
//     foreach ($errors as $error) {
//         echo "<p>$error</p>";
//     }
//     exit;
// }

// // Create EOI table if not exists

// $conn->query($sqlCreateTable);
// $insertTable = "INSERT INTO EOI (jobRef, firstName, lastName, dob, gender, address, town, state, postcode, email, phone, skills, otherSkills) VALUES ($jobRef, $firstName, $lastName, $dob, $gender, $address, $town, $state, $postcode, $email, $phone, $skills, $otherSkills)";
// Insert validated data into the database
$conn->query("INSERT INTO eoi (first_name, last_name, postcode) VALUES ('$firstName', '$lastName', '$gender')");


$conn->close();
?>
