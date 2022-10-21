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
	foreach ($data as $key => $item) {
		// echo $item->email;
		// echo var_dump($key);
		foreach ($item as $i => $val) {
			if ($_SESSION['uname'] == $val) {
				echo $item->email;
			}
			/* echo $i;
			echo "</br>"; */
		}
	}
	?>

	<?php @include "./footer.php" ?>
</body>

</html>