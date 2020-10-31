
<!DOCTYPE HTML>  
<html>

<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $DOBErr = $genderErr = $dgreeErr = $blood_groupErr = "";
$name = $email = $DOB = $gender = $degree = $blood_group = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and a-zA-Z- allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
   if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>

  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
 <br><br>
 Degree:
  <input type="checkbox" name="gender" <?php if (isset($gender) && $gender=="SSC") echo "checked";?> value="SSC">SSC
  <input type="checkbox" name="gender" <?php if (isset($gender) && $gender=="HSC") echo "checked";?> value="HSC">HSC
  <input type="checkbox" name="gender" <?php if (isset($gender) && $gender=="Bsc") echo "checked";?> value="Bsc">Bsc
<input type="checkbox" name="gender" <?php if (isset($gender) && $gender=="Msc") echo "checked";?> value="Msc">Msc 
  <br><br>
  Blood group:
   <label for="blood_group"></label>
  <select id="blood_group" name="blood_group">
    <option value="AB+">AB+</option>
    <option value="B+">B+</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>
  <br><br>
  
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo $degree;
echo $blood_group;
?>

</body>
</html>