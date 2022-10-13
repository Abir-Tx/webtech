<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lab 3| Task 2</title>
</head>

<body>

	<?PHP
	$unameErr = "";
	$uname = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["uname"])) {
			$unameErr = "Name is required";
		} elseif (!preg_match('/^[a-zA-Z0-9 ".-_]+$/', $_POST["uname"])) {
			$unameErr = "Can only contain alpha numeric charracters, period, dash or underscore only";
		} elseif (str_word_count($_POST["uname"]) < 2) {
			$unameErr = "Must contain at least two words";
		} else {
			$uname = $_POST["uname"];
		}
	}
	?>
	<div class="loginBox">
		<h2>
			Login
		</h2>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
			<label for="uname">User Name: </label>
			<input type="text" name="uname" id="uname">
			<span class="error">* <?php echo $unameErr; ?></span>
			<br><br>


			<label for="password">Password: </label>
			<input type="password" name="password" id="password">
			<br><br>


			<input type="checkbox" name="remMe" id="remMe">
			<label for="remMe">Remember Me</label>
			<br><br>

			<input type="Submit" value="submit">
			<a href="#">Forgot Password</a>
		</form>
	</div>
</body>

</html>