<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Profile | RecruiterX</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
</head>

<body>
	<?php
	@include "./header.php";
	@include "./util.php";


	$details  =  fetch("../data.json", "./logout.php");
	@include "./subMenu.php";
	?>
	<!-- htmL -->
	<h2>Profile</h2>

	<div class="details">
		<label for="name">Name : <?php echo ucFirst($details[0]) ?></label>
		<br><br>
		<label for="email">Email : <?php echo $details[1] ?></label>
		<br><br>
		<label for="gender">Gender : <?php echo ucfirst($details[2]) ?></label>
		<br><br>
		<label for="dob">Date of Birth : <?php echo $details[3] ?></label>
		<br><br>
	</div>
	<div class="editBtnCon">
		<button>
			<a href="./edit.php">Edit Profile</a>
		</button>
	</div>

	<?php @include "./footer.php" ?>
</body>

</html>