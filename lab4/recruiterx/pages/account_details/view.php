<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Profile | RecruiterX</title>
</head>

<body>
	<?php
	@include "./util.php";

	$details  =  fetch("../../data.json");
	?>
	<!-- htmL -->
	<h2>Profile</h2>

	<div class="details">
		<label for="name">Name :<?php echo $details[0] ?></label>
		<br><br>
		<label for="email">Email :<?php echo $details[1] ?></label>
		<br><br>
		<label for="gender">Gender :<?php echo $details[2] ?></label>
		<br><br>
		<label for="dob">Date of Birth :<?php echo $details[3] ?></label>
		<br><br>
	</div>
	<div class="editBtnCon">
		<button>
			<a href="#">Edit Profile</a>
		</button>
	</div>
</body>

</html>