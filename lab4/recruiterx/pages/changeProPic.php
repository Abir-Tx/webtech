<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Profile Picture | RecruiterX</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
</head>

<body>
	<?php
	@include "./header.php";
	@include "./util.php";


	$details  =  fetch("../data.json", "./logout.php");
	@include "./subMenu.php";

	if (isset($details[5]) && !empty($details[5])) {
		$ifile = $details[5];
	} else $ifile = "avatar.svg";
	?>
	<!-- HTML -->
	<h2>Change Profile Picture</h2>
	<div class="changeProPic">
		<div class="imageCon">
			<img src='../images/<?php echo $ifile ?>' alt='Profile picture of <?php echo $details[0] ?>' height="150px">
		</div>
		<br>

		<form action=<?php echo $_SERVER["PHP_SELF"] ?> method="post">
			<label for="updateProPic">Select New Profile Image: </label>
			<input type="file" name="updateProPic" id="updateProPic">
			<br><br>
			<input type="submit" value="Submit">
		</form>
	</div>
	<?php @include "./footer.php" ?>
</body>

</html>