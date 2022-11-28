<!-- Individual Product delete page -->
<!-- By Mushfiqur Rahman Abir  -->
<!-- Code for lab 5 task C by Mushfiqur Rahman Abir - 20-42738-1 -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Product</title>
</head>

<body>
	<h2>
		Delete Product
	</h2>
	<?php
	// Delete product from the database using the id
	include_once '../../model/db_connect.php';
	// Create a query to select all the products
	$conn = db_conn();
	$id = $_GET['id'];
	// $selectQuery = "UPDATE `products` SET `display` = '0' WHERE `id` = '$id'";
	$selectQuery = "DELETE FROM `products` WHERE `id` = '$id'";
	try {
		$stmt = $conn->query($selectQuery);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	// Redirect to the View page
	header('location: ./view_product.php');
	?>
	<a href="../index.php">Go Homepage</a>
</body>

</html>