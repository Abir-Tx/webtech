<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Profile</title>
</head>

<body>
	<?php
	$imageFileType = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// check size limit
		if (empty($_FILES["upFile"])) {
			echo "You have to select an image";
		} elseif (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		) {
			echo "Sorry, only JPG, JPEG, PNG files are allowed.";
		} elseif ($_FILES["upFile"]["size"] > 50000) {
			echo "File size can not be over 5MB";
		}
	}
	?>
	<!-- Number 3 -->
	<div class="proPic">
		<h2>Profile Picture</h2>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

			<input type="file" name="upFile" id="upFile">
			<hr>
			<input type="submit" value="Submit" name="submit">
		</form>
	</div>
	<br>
	<a href="./index.php">Home</a>
</body>

</html>