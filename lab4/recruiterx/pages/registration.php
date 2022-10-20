<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration | RecruiterX</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
	<link rel="stylesheet" href="../styles/scss/registration.css">
</head>

<body>
	<?php @include "./header.php" ?>

	<?php
	$nameErr = $emailErr = $dobErr =  $genderErr = $newPassErr = $conPassErr = $unameErr = "";
	$name = $email = $dob = $gender = $uname = "";
	$passed = false;
	$dataFileLoc = "../data.json";
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
			$passed = true;
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		} else {
			$email = $_POST["email"];
			$passed = true;
		}

		// Password
		if (empty($_POST["newPass"]) || empty($_POST["conPass"])) {
			$newPassErr = $conPassErr = "This field can not be empty";
		} elseif ($_POST["newPass"] == $_POST["conPass"]) {
			$newPass = $_POST["newPass"];
			$passed = true;
		} else
			$newPassErr = "The new password do not match with the retyped password";

		// Gender
		if (empty($_POST["gender"])) {
			$genderErr = "You must select at least one";
		} else {
			$gender = $_POST["gender"];
			$passed = true;
		}

		// DOB
		if (empty($_POST["date"])) $dobErr = "Date of Birth is required";
		else {
			$year = date("Y", strtotime($dob));
			if ((int)$year < 1900 || (int)$year > 2022) {
				$dobErr = "The selected date must be in valid range";
			} else {
				$dob = $_POST["date"];
				$passed = true;
			}
		}

		// User name
		if (empty($_POST["uname"])) {
			$unameErr = "User name can not be empty";
		} else {
			$uname = $_POST["uname"];
			$passed = true;
		}


		if ($passed) {
			$data = array();
			$data = array(
				'name' => $name,
				'email' => $email,
				'uname' => $uname,
				'password' => $newPass,
				'gender' => $gender,
				'dob' => $dob,
			);

			$jsonData = json_encode($data);

			if (!empty($jsonData)) {
				file_put_contents($dataFileLoc, $jsonData, FILE_APPEND);
				echo "Submission Successfull";
			} else echo "Errors occured";
		} else echo "Can not submit data";
	}

	?>


	<!-- HTML Codes -->
	<div class="reg">
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
			<div class="inputsCon">
				<label for="name">Name: </label>
				<input type="text" name="name" id="name">
				<span class="error">* <?php echo $nameErr; ?></span>
				<hr>

				<label for="email">Email: </label>
				<input type="email" name="email" id="email">
				<span class="error">* <?php echo $nameErr; ?></span>
				<hr>

				<label for="uname">User Name: </label>
				<input type="text" name="uname" id="uname">
				<span class="error">* <?php echo $unameErr; ?></span>
				<hr>


				<label for="newPass">New Password: </label>
				<input type="password" name="newPass" id="newPass">
				<span class="error">* <?php echo $newPassErr; ?></span>
				<hr>

				<label for="conPass">Confirm Password: </label>
				<input type="password" name="conPass" id="conPass">
				<span class="error">* <?php echo $conPassErr; ?></span>
				<hr>

				<label for="gender" class="inpLabel">Gender: </label>
				<input type="radio" name="gender" value="female">Female
				<input type="radio" name="gender" value="male">Male
				<input type="radio" name="gender" value="other">Other
				<span class="error">* <?php echo $genderErr; ?></span>
				<hr>
			</div>

			<label for="date" class="inpLabel">Date of Birth: </label>
			<input type="date" name="date" id="date">
			<span class="error">* <?php echo $dobErr; ?></span>
			<hr>


			<div class="btnCon">
				<input type="submit" value="Submit">
				<br><br>
				<input type="reset" value="Reset">
			</div>
		</form>
	</div>
	<?php @include "./footer.php" ?>
</body>

</html>