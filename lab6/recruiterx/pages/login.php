<!-- Login page | RecruiterX | By Mushfiqur Rahman Abir-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | RecruiterX</title>

	<link rel="stylesheet" href="../styles/scss/login.css">
	<link rel="stylesheet" href="../styles/scss/header.css">
	<link rel="stylesheet" href="../styles/scss/common.css">
</head>

<body>
	<?php
	session_start();
	@include "./header.php";
	@require_once "../scripts/db_connect.php";


	$unameErr = $passErr = "";
	$uname = $pass = "";
	$cookieTimeout = 120;
	$passed = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// Validate User name
		if (empty($_POST["uname"])) {
			$unameErr = "Name is required";
		} elseif (!preg_match('/^[a-zA-Z0-9 ".-_]+$/', $_POST["uname"])) {
			$unameErr = "Can only contain alpha numeric charracters, period, dash or underscore only";
		} elseif (str_word_count($_POST["uname"]) < 1) {
			$unameErr = "Must contain at least one word";
		} else {
			$uname = $_POST["uname"];
			$inputOk = true;
		}


		// Validate Password
		if (empty($_POST["password"])) {
			$passErr = "Password cannot be empty";
		} elseif (strlen($_POST["password"]) < 8) {
			$passErr = "Cannot be less than 8";
		} elseif (strlen($_POST["password"]) > 8) {
			!strpos($_POST["password"], "@" || "#" || "$" || "%") ? $passErr = "Must contain at least one special characer" : $pass = $_POST["password"];
		} else {
			$pass = $_POST["password"];
			$inputOk = true;
		}

		// Remember Me check
		if (!empty($_POST['remMe'])) {
			setcookie("uname", $uname, time() + $cookieTimeout);
			setcookie("password", $pass, time() + $cookieTimeout);
			// echo "Cookie set successfully";
		} else {
			setcookie("uname", "");
			setcookie("password", "");
			// echo "Cookie not set";
		}



		/*  matching with Database */
		// Handle success or unsuccessfull login
		// $loginSuccess ? header("Location: ./dashboard.php") . (die()) : print("Login Failed");
		// DB
		$conn = db_connect();
		$selectQuery = "SELECT * FROM users WHERE uname = :uname AND password = :password";
		try {
			$stmt = $conn->prepare($selectQuery);
			$stmt->execute([
				":uname" => $uname,
				":password" => $pass
			]);

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if (count($result) > 0) {
				$passed = true;
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		if ($passed) {
			session_start();
			header("Location: ./dashboard.php");
			$_SESSION["uname"] = $uname;
			die();
			/* Store the whole user info into an array in session */
		} else {
			echo "Login failed";
		}
	}
	?>

	<!-- HTML -->
	<div class="loginBox">
		<div class="miniCon">
			<h2 class="title">
				Login To RecruiterX
			</h2>

			<div class="formContainer">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<label for="uname">User Name: </label>
					<input class="inp" type="text" name="uname" id="uname" value=<?php if (isset($_COOKIE['uname'])) {
														echo $_COOKIE['uname'];
													} ?>>
					<span class="error">* <?php echo $unameErr; ?></span>
					<br><br>


					<label for="password">Password: </label>
					<input class="inp" type="password" name="password" id="password" value=<?php if (isset($_COOKIE['password'])) {
															echo $_COOKIE['password'];
														} ?>>
					<span class="error">* <?php echo $passErr; ?></span>
					<br><br>


					<input type="checkbox" name="remMe" id="remMe" <?php if (isset($_COOKIE['uname'])) {
												echo "checked='checked'";
											} ?>>
					<label class="remMe" for="remMe">Remember Me</label>
					<br><br>

					<div class="btnCon">
						<input type="Submit" value="Login" class="subBtn">
					</div>
					<br><br>
					<!-- Task no D - Forgot Password-->
					<div class="linkCon">
						<p>
							<a href="./passReset.php">Forgot Password?</a>
						</p>
					</div>
				</form>
			</div>
		</div>

	</div>
	<?php @include "./footer.php" ?>
</body>

</html>