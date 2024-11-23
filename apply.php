<?php
// Set the page title
$title = "Application Form";
include 'header.inc'; // Include the header
include 'menu.inc';   // Include the menu
?>

<form id = "apply-form" method="POST" action = "processEOI.php" novalidate="novalidate">
    <fieldset class="JobID" >
      <legend>Job</legend>
      <label for="JobID"> Application for * <input type="text" name="JobID" id="JobID" pattern="\d{5}" maxlength="5" required > </label>
    </fieldset>
    <fieldset>
      <legend>Personal data</legend>
      <section class = "names">
        <label for="firstname">
          First name *
          <input type="text" id="firstname" maxlength="20" name="first_name" required >
        </label>
        <label for="familyname">
          Family name *
          <input type="text" id="familyname"  maxlength="20" name="family_name" required>
        </label>
      </section>
      <section>
        <fieldset>
            <legend>Gender</legend>
            <p>
                <label for="male">Male
                    <input type="radio" name=gender value="male" id="male" checked required >
                </label>
                <label for="female">Female
                    <input type="radio" id="female"value="female" name=gender>
                </label>
                <label for="others">Others
                    <input type="radio" id="others"value="others" name=gender>
                </label>
            </p>
        </fieldset>
        <label for="dob">
          Date of birth
          <input type="date" id="dob" name="DOB" required>
        </label>
      </section>
      <section>
        <label for="address">Street Address 
            <input type="text" id="address" maxlength="40" name="Address" required>
        </label>
        <label for="town">Suburb/Town
            <input type="text" maxlength="40" id="town" name="Town" required>
        </label>
        <label for="postcode">Postcode
            <input type="text"  pattern="\d{4}" id="postcode" maxlength="4" size="10" name="Postcode" required>
        </label>
      </section>
      <section>
        <label for="state">State</label>
        <select name="state" id="state" required>
            <option value="" selected>Select</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
        </select>
      </section>
      <section>
        <label for="email">Email Address
            <input type="text" id="email" placeholder="abc@example.com" name="Email" required>
        </label>
        <label for="phone">Phone Number
            <input type="text" id="phone" pattern="(\d\s?){8,12}" placeholder="123-456-789" maxlength="12" name="Phone number" required>
        </label>
      </section>
      <section>
        <fieldset>
            <legend>Skills</legend>
            <label for="com">Communication skills
                <input type="checkbox" id="com" name='skills[]' value="Communication skills" checked="checked" required>
            </label>
            <label for="team">Teamworking skills
                <input type="checkbox" id="team" name="skills[]" value="Teamworking">
            </label>
            <label for="other_skills">Other skills
              <textarea name="other_skills" id="other_skills" cols="30" rows="10" placeholder="Example: Problem Solving Skill" ></textarea>
              </label>
        </fieldset>
      </section>
    </fieldset>
    <section class="btns">
      <input type="submit" value="Submit application">
      
    </section>
  </form>
  </body>
</html>

