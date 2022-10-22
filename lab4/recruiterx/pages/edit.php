<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile | RecruiteX</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
</head>

<body>
	<?php
	@include "./header.php";
	@include "./util.php";


	$details  =  fetch("../data.json", "./logout.php");
	@include "./subMenu.php";
	?>
</body>

</html>