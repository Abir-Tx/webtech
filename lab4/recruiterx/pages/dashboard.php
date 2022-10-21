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

	echo "<H1>Welcome " . ucwords($name) . "</H1>";
	?>

	<?php @include "./footer.php" ?>
</body>

</html>