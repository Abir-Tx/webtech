<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../styles/scss/header.css">
</head>

<body>
	<?php @include "./header.php" ?>
	<?php
	session_start();
	echo "Welcome " . $_SESSION["uname"];
	?>
	Dashboard
	<?php @include "./footer.php" ?>
</body>

</html>