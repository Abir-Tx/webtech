<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Product</title>
</head>

<body>
	<h2>
		View Product
	</h2>
	<table>
		<tr>
			<th>Name</th>
			<th>Profit</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		// Code for lab 5 task B by Mushfiqur Rahman Abir - 20-42738-1
		// Include the database connection file
		include_once '../../model/db_connect.php';
		// Create a query to select all the products
		$conn = db_conn();
		$selectQuery = 'SELECT * FROM `products` where `display` = "1"';
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
			echo "<tr>
			<td>$name</td>
			<td>$profit</td>
			<td><a href='./edit_product.php?id=$id'>Edit</a></td>
			<td><a href='./delete_product.php?id=$id'>Delete</a></td>
			</tr>";
		}



		?>
</body>

</html>