<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lab 3| Task 2</title>

	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?PHP
	$unameErr = $passErr = "";
	$uname = $pass = "";

	$message = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// User name
		if (empty($_POST["uname"])) {
			$unameErr = "Name is required";
		} elseif (!preg_match('/^[a-zA-Z0-9 ".-_]+$/', $_POST["uname"])) {
			$unameErr = "Can only contain alpha numeric charracters, period, dash or underscore only";
		} elseif (str_word_count($_POST["uname"]) < 2) {
			$unameErr = "Must contain at least two words";
		} else {
			$uname = $_POST["uname"];
			$message = "Submitted Successfully";
		}


		// Password
		if (empty($_POST["password"])) {
			$passErr = "Password cannot be empty";
		} elseif (strlen($_POST["password"]) < 8) {
			$passErr = "Cannot be less than 8";
		} elseif (strlen($_POST["password"]) > 8) {
			!strpos($_POST["password"], "@" || "#" || "$" || "%") ? $passErr = "Must contain at least one special characer" : $pass = $_POST["password"];
		} else {
			$pass = $_POST["password"];
			$message = "Submitted Successfully";
		}
	}
	?>
	<div class="loginBox">
		<h2>
			Login
		</h2>

		<div class="formContainer">
			<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				<label for="uname">User Name: </label>
				<input type="text" name="uname" id="uname">
				<span class="error">* <?php echo $unameErr; ?></span>
				<br><br>


				<label for="password">Password: </label>
				<input type="text" name="password" id="password">
				<span class="error">* <?php echo $passErr; ?></span>
				<br><br>


				<input type="checkbox" name="remMe" id="remMe">
				<label class="remMe" for="remMe">Remember Me</label>
				<br><br>

				<input type="Submit" value="Submit" class="subBtn">
				<br><br>
				<a href="#">Forgot Password</a>
				<br><br>

				<span class="msg"><?php echo $message; ?></span>
			</form>
		</div>
	</div>
</body>

</html>