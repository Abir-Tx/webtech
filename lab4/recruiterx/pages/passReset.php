<!-- Forgot Password Page -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password | RecruiterX</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
</head>

<body>
	<?php @include "./header.php" ?>
	<?php
	// variables
	$emailErr = "";
	$email = "";
	$msg = "";
	$dataFileLoc = "../data.json";


	// Validate email
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		} else {
			$email = $_POST["email"];
		}

		// Getting the data
		$data = json_decode(file_get_contents($dataFileLoc), true);

		foreach ($data as $key => $value) {
			$key == "email" ? ($value == $email ? $msg = "Account password reset successfull" : $msg = "Sorry ! Can not reset your password") : null;
		}
	}
	?>
	<div class="passResCon">
		<h2>
			Forgot Password?
		</h2>

		<div class="formCon">
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				<label for="email">Enter Email: </label>
				<input type="email" name="email" id="email">
				<span class="error">* <?php echo $emailErr; ?></span>
				<br><br>
				<span class="msg">Status: <?php echo $msg; ?></span>
				<!-- <hr> -->
				<br><br>

				<input type="submit" value="Reset">
				<br><br>
			</form>
		</div>
	</div>
	<?php @include "./footer.php" ?>
</body>

</html>