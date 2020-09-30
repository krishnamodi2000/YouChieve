<!DOCTYPE HTML>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $jobtitleErr=$DOB=$DOT=$DOJ = $intcollabErr="";
$name = $email = $gender =$intcollab= $skills = $jobtitle = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
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

  if (empty($_POST["jobtitle"])) {
    $jobtitle = "";
  } else {
    $jobtitle = test_input($_POST["jobtitle"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/",$jobtitle)) {
      $jobtitleErr = "Only letters and white space allowed";
    }
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
  }

  if (empty($_POST["skills"])) {
    $skills = "";
  } else {
    $skills = test_input($_POST["skills"]);
  }
  if (empty($_POST["DOB"])) {
    $DOB = "";
  } else {
    $DOB = test_input($_POST["DOB"]);
  }
  if (empty($_POST["DOT"])) {
    $DOT = "";
  } else {
    $DOT = test_input($_POST["DOT"]);
  }
  if (empty($_POST["DOJ"])) {
    $DOJ = "";
  } else {
    $DOJ = test_input($_POST["DOJ"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  $intcollab = (isset($_POST['intcollab']) ? $_POST['intcollab']: false);
   if (empty($_POST["intcollab"])) {

      $intcollabErr="Select Appropriate Field";
   } else {

     $intcollab = test_input($_POST["intcollab"]);
   }
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center><h2>Intern/Collaboration Form</h2>
</center>
<div class="d-flex justify-content-center" style="padding:10px;">


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Full Name: <input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter Full Name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>" placeholder="Enter Your Email Address">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date Of Birth: <input type="date"  name="DOB" value="<?php echo $DOB;?>" placeholder="Select Date Of Birth">
  <br><br>
  Gender:
  &nbsp<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">&nbsp Female
  &nbsp<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">&nbsp Male
  &nbsp<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">&nbsp Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Do you want to do:
  <select name="intcollab" value="<?php echo $intcollab;?>">
    <option value="first">Internship</option>
    <option value="second">Collaboration</option>
  </select>
  <span class="error">* <?php echo $intcollabErr;?></span>
  <br><br>
  Date Of Joining: <input type="date"  name="DOJ" value="<?php echo $DOJ;?>" placeholder="Select Date Of Joining">
   &nbsp
  Date Of Termnation: <input type="date"  name="DOT" value="<?php echo $DOT;?>" placeholder="Select Date Of Termnation">
  <br><br>
  Job Title: <input type="text" name="jobtitle" value="<?php echo $jobtitle;?>"  placeholder="Enter Job Title">
  <span class="error"><?php echo $jobtitleErr;?></span>
  <br><br>
  Skills: <br><textarea name="skills" rows="5" cols="40" placeholder="Describe Your Skills"><?php echo $skills;?></textarea>
  <br><br>
  <input class="submit" type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>
