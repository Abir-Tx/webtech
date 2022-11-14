<!-- Individual Product delete page -->
<!-- By Mushfiqur Rahman Abir  -->

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
	// Code for lab 5 task C by Mushfiqur Rahman Abir - 20-42738-1
	// Delete product from the database using the id
	// Include the database connection file
	include_once '../../model/db_connect.php';
	// Create a query to select all the products
	$conn = db_conn();
	$id = $_GET['id'];
	$selectQuery = "UPDATE `products` SET `display` = '0' WHERE `id` = '$id'";
	try {
		$stmt = $conn->query($selectQuery);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	// Loop through the products and display them in the table	
	header('location: ./view_product.php');

	?>

</body>

</html>