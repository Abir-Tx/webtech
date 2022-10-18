<!-- Login page -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | RecruiterX</title>

	<link rel="stylesheet" href="./styles/scss/login.css">
</head>

<body>

	<?PHP
	$unameErr = $passErr = "";
	$uname = $pass = "";
	$loginSuccess = false;

	$message = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// User name
		if (empty($_POST["uname"])) {
			$unameErr = "Name is required";
		} elseif (!preg_match('/^[a-zA-Z0-9 ".-_]+$/', $_POST["uname"])) {
			$unameErr = "Can only contain alpha numeric charracters, period, dash or underscore only";
		} elseif (str_word_count($_POST["uname"]) < 1) {
			$unameErr = "Must contain at least one word";
		} else {
			$uname = $_POST["uname"];
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
		}

		// matching with json data


		// Getting the json data
		$data = json_decode(file_get_contents("./data.json"), true);

		// echo $data2;
		foreach ($data as $key => $value) {
			if ($key == "uname") {
				if ($value == $uname) $loginSuccess = true;
				else {
					$unameErr = "Username do not match";
					!$loginSuccess;
				}
			}


			if ($key == "password") $value == $pass ? $loginSuccess = true : (($passErr = "Password do not match!") . (!$loginSuccess));
		}
		$loginSuccess ? print("Success") : print("Failed");
	}
	?>
	<div class="loginBox">
		<div class="miniCon">
			<h2 class="title">
				Login
			</h2>

			<div class="formContainer">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<label for="uname">User Name: </label>
					<input class="inp" type="text" name="uname" id="uname">
					<span class="error">* <?php echo $unameErr; ?></span>
					<br><br>


					<label for="password">Password: </label>
					<input class="inp" type="text" name="password" id="password">
					<span class="error">* <?php echo $passErr; ?></span>
					<br><br>


					<input type="checkbox" name="remMe" id="remMe">
					<label class="remMe" for="remMe">Remember Me</label>
					<br><br>

					<div class="btnCon">
						<input type="Submit" value="Submit" class="subBtn">
					</div>
					<br><br>

					<span class="msg"><?php echo $message; ?></span>
				</form>
			</div>
		</div>
	</div>
</body>

</html>