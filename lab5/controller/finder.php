	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// Code for lab 5 task E by Mushfiqur Rahman Abir - 20-42738-1
		// Search product from the database using the name
		// Include the database connection file
		include_once '../model/db_connect.php';
		// Create a query to select all the products
		$conn = db_conn();
		$search = $_POST['search'];
		$selectQuery = "SELECT * FROM `products` WHERE `product_name` LIKE '%$search%'";
		try {
			$stmt = $conn->query($selectQuery);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		// Loop through the products and display them in the table
		echo "
	<h1>Search Result</h1>";
		if ($stmt->rowCount() > 0) {
			echo "<table border='1' cellpadding='10'>";
			echo "<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Buying Price</th>
					<th>Selling Price</th>
					<th>Display</th>
				</tr>";
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
				$isDisplayed = $row['display'] == 1 ? "Yes" : "No";
				echo "<tr>
						<td>{$id}</td>
						<td>{$product_name}</td>
						<td>{$buying_price}</td>
						<td>{$selling_price}</td>
						<td>{$isDisplayed}</td>
					</tr>";
			}
			echo "</table>";
		} else {
			echo "No products found.";
		}
	}
	?>