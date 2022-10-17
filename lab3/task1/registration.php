<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
</head>

<body>
	<!-- Number 4 -->
	<div class="reg">
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

			$data = array();
			$data = array(
				'name' => $name,
				'email' => $email,
			);
			$jsonData = json_encode($data);


			echo $jsonData;
		}
		?>
		<h2>Registration</h2>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
			<label for="name">Name: </label>
			<input type="text" name="name" id="name">
			<span class="error">* <?php echo $nameErr; ?></span>
			<hr>

			<label for="email">Email: </label>
			<input type="email" name="email" id="email">
			<span class="error">* <?php echo $nameErr; ?></span>
			<hr>

			<input type="submit" value="Submit">
		</form>
	</div>
</body>

</html>