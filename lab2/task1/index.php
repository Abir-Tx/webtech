<!-- ID: 20-42738-1 -->

<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="./style.css">
</head>

<body>

  <?php
  $nameErr = $emailErr = $dobErr =  $genderErr = $degreeErr = $bloodErr = "";
  $name = $email = $dob = $gender = $comment = $degree = $blood = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } elseif (str_word_count($_POST["name"]) < 2) {
      $nameErr = "Must contain at least two words";
    } elseif (!preg_match('/^[a-z]/i', $_POST["name"])) {
      $nameErr = "Name must start with letters";
    } elseif (!preg_match('/^[a-zA-Z ".-]+$/', $_POST["name"])) {
      $nameErr = "Can contain a-z, A-Z, period, dash only";
    } else {
      $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } else {
      $email = $_POST["email"];
    }

    if (empty($_POST["date"])) $dobErr = "Date of Birth is required";
    else $dob = $_POST["date"];

    if (empty($_POST["gender"])) {
      $genderErr = "You must select at least one";
    } else {
      $gender = $_POST["gender"];
    }

    if (empty($_POST["degree"])) {
      $degreeErr = "Cannot be empty";
    } else {
      $checked_arr = $_POST['degree'];
      $count = count($checked_arr);
      if ($count < 2) {
        $degreeErr = "At least 2 must be selected";
      } else $degree = $_POST["degree"];
    }

    if (empty($_POST["bloodGroup"])) {
      $bloodErr = "Must select one";
    } elseif ($_POST["bloodGroup"] == "none") {
      $bloodErr = "Must select one";
    } else {
      $blood =  $_POST["bloodGroup"];
    }
  }
  ?>

  <h2>PHP Form Validation</h2>
  <h6>Lab 2 Task 1 | ID: 20-42738-1</h6>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="name" class="inpLabel">Name: </label>
    <input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    <label for="email" class="inpLabel">E-mail: </label>
    <input type="text" name="email">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>

    <label for="date" class="inpLabel">Date of Birth: </label>
    <input type="date" name="date" id="date">
    <span class="error">* <?php echo $dobErr; ?></span>

    <br><br>
    <label for="gender" class="inpLabel">Gender: </label>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr; ?></span>


    <br><br>
    <label for="degree" class="inpLabel">Degree: </label>
    <input type="checkbox" name="degree[]" id="ssc">
    <label for="ssc">SSC</label>
    <input type="checkbox" name="degree[]" id="hsc">
    <label for="hsc">HSC</label>
    <input type="checkbox" name="degree[]" id="bsc">
    <label for="bsc">BSc</label>
    <input type="checkbox" name="degree[]" id="msc">
    <label for="msc">MSc</label>
    <span class="error">* <?php echo $degreeErr; ?></span>


    <br><br>
    <label for="bloodGroup" class="inpLabel">Blood Group: </label>
    <select name="bloodGroup" id="bloodGroup">
      <option value="none"></option>
      <option value="Apos">A+</option>
      <option value="Bpos">B+</option>
    </select>
    <span class="error"> <?php echo $bloodErr; ?></span>
    <br><br>

    <p class="submitBtn"><input type="submit" name="submit" value="Submit" class="submit"></p>

  </form>

</body>

</html>