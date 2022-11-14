	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// Code for lab 5 task E by Mushfiqur Rahman Abir - 20-42738-1
		// Search product from the database using the name
		// Include the database connection file
		include_once '../../model/db_connect.php';
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
		echo "<table border='1'>
	<tr>
	<th>Id</th>
	<th>Name</th>
	<th>Buying Price</th>
	<th>Selling Price</th>
	<th>Display</th>
	</tr>";
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['product_name'] . "</td>";
			echo "<td>" . $row['buying_price'] . "</td>";
			echo "<td>" . $row['selling_price'] . "</td>";
			echo "<td>" . $row['display'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>