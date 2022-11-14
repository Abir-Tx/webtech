<!-- Product Edit page -->
<!-- By Mushfiqur Rahman Abir - 20-42738-1 -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Product</title>
</head>

<body>
	<h2>
		Edit Product
	</h2>
	<?php
	// Code for lab 5 task C by Mushfiqur Rahman Abir - 20-42738-1
	// Include the database connection file
	include_once '../../model/db_connect.php';
	// Create a query to select all the products
	$conn = db_conn();
	$id = $_GET['id'];
	$selectQuery = "SELECT * FROM `products` where `id` = '$id'";
	try {
		$stmt = $conn->query($selectQuery);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	// Loop through the products and display them in the table
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$id = $row['id'];
		$name = $row['product_name'];
		$buyingPrice = $row['buying_price'];
		$sellingPrice = $row['selling_price'];
		$profit = $sellingPrice - $buyingPrice;
		echo "<form action='../../controller/update_product.php' method='POST'>
		<input type='hidden' name='id' value='$id'>
		<label for='name'>Name</label>
		<input type='text' name='name' value='$name'>
		<br>
		<label for='buyingPrice'>Buying Price</label>
		<input type='number' name='buyingPrice' value='$buyingPrice'>
		<br>
		<label for='sellingPrice'>Selling Price</label>
		<input type='number' name='sellingPrice' value='$sellingPrice'>
		<br>
		<input type='submit' value='Update'>
		</form>";
	}
	?>

</body>

</html>