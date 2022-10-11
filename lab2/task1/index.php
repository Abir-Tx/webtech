<!-- ID: 20-42738-1 -->

<!DOCTYPE HTML>
<html>

<head>
</head>

<body>

  <?php
  $nameErr = $emailErr = $genderErr = $websiteErr = "";
  $name = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } elseif (str_word_count($_POST["name"]) < 2) {
      $nameErr = "Must contain at least two words";
    } elseif (!preg_match('/^[a-z]/i', $_POST["name"])) {
      $nameErr = "Name must start with letters";
    } else {
      $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = $_POST["email"];
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
    <input type="submit" name="submit" value="Submit">
  </form>

</body>

</html>