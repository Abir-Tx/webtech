<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard | RecruiterX </title>
	<link rel="stylesheet" href="../styles/scss/header.css">
	<link rel="stylesheet" href="../styles/scss/common.css">
</head>

<body>
	<?php @include "./header.php" ?>
	<?php
	session_start();
	if (isset($_SESSION['uname'])) {
		$dataFileLoc = "../data.json";
		$data = json_decode(file_get_contents($dataFileLoc));
		$name =  $email = "";

		foreach ($data as $key => $obj) {
			// Fetch information of only the logged in user using session
			foreach ($obj as $item => $val) {
				if ($_SESSION['uname'] == $val) {
					$name = $obj->name;
					$email = $obj->email;
				}
			}
		}

		// Displaying the details
		echo "<code>logged in as " . $_SESSION['uname'] . " | </code>";
		print('<a href="./logout.php">logout</a>');
		echo "<H1>Welcome " . ucwords($_SESSION['uname']) . "</H1>";
		// Including the subpages/components
		@include "./subMenu.php";
	} else {
		echo "<p> You need to be logged in to be able to view this page</p>";
		echo "<p>Please Login</p>";
	}
	?>

	<?php @include "./footer.php" ?>
</body>

</html>