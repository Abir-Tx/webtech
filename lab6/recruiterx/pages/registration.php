<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration | RecruiterX</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
	<link rel="stylesheet" href="../styles/scss/registration.css">
	<link rel="stylesheet" href="../styles/scss/common.css">
</head>

<body>
	<?php
	@include "./header.php";
	@require_once "../scripts/db_connect.php";
	?>

	<?php
	$nameErr = $emailErr = $dobErr =  $genderErr = $newPassErr = $conPassErr = $unameErr = $proPicErr = "";
	$name = $email = $dob = $gender = $uname = $proPic = $newPass = "";
	$passed = false;



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

		// Profile Picture Upload & check
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			$proPicErr =  "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			/* && $imageFileType != "gif" */
		) {
			$proPicErr =  "Sorry, only JPG, JPEG, PNG files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$proPicErr =  "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
				$passed = true;
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}


		if ($passed) {
			// Assignment
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["newPass"];
			$cpassword = $_POST["conPass"];
			$dob = $_POST["date"];
			$proPic = $target_file;
			$gender = $_POST["gender"];
			$uname = $_POST["uname"];

			// Check both the password
			if ($password === $cpassword) {
				$passed = true;
			}

			// DB
			$conn = db_connect();
			$insertQuery = "INSERT INTO users (name, email, uname, password, gender, dob, imageFile) VALUES (:name, :email,:uname, :password, :gender, :dob, :imageFile)";
			try {
				$stmt = $conn->prepare($insertQuery);
				if ($passed) {
					$stmt->execute([
						":name" => $name,
						":email" => $email,
						":uname" => $uname,
						":password" => $password,
						":gender" => $gender,
						":dob" => $dob,
						":imageFile" => $_FILES["fileToUpload"]["name"]

					]);

					echo "User added successfully";
				}
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			$conn = null;
		}
	}

	?>


	<!-- HTML Codes -->
	<div class="reg">
		<h2>
			Register For RecruiterX
		</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
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

			<label for="fileToupload">Profile Picture: </label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<span class="error">* <?php echo $proPicErr; ?></span>
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