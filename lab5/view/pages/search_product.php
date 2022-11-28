<!-- Search the database by Mushfiqur Rahman Abir-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Product</title>
</head>

<body>
	<!-- <?php @include "../../controller/finder.php" ?> -->
	<h2>
		Search Product
	</h2>
	<!-- Create a form with search input -->
	<form action="../../controller/finder.php" method="POST">
		<input type="text" name="search" placeholder="Search by name">
		<input type="submit" name="submit" value="Search">
	</form>
	<a href="../index.php">Go Homepage</a>
</body>

</html>