<!-- ID: 20-42738-1 -->

<!DOCTYPE HTML>
<html>

<head>
</head>

<body>

  <?php
  $nameErr = $emailErr = $dobErr =  $genderErr = $websiteErr = "";
  $name = $email = $dob = $gender = $comment = $website = "";

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
      $genderErr = "Gender is required";
    } else {
      $gender = $_POST["gender"];
    }
  }
  ?>

  <h2>PHP Form Validation</h2>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>

    <label for="date">Date of Birth: </label>
    <input type="date" name="date" id="date">
    <span class="error">* <?php echo $dobErr; ?></span>

    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr; ?></span>


    <input type="submit" name="submit" value="Submit">

  </form>

</body>

</html>