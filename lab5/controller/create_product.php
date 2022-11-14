<?php
@require_once "../model/db_connect.php";

if (isset($_POST['product_name']) && isset($_POST['buying_price']) && isset($_POST['selling_price'])) {
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `products` WHERE `product_name` = :product_name";
	try {
		$stmt = $conn->prepare($selectQuery);
		$stmt->execute([
			':product_name' => $_POST['product_name']
		]);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($row) {
		echo "Product already exists";
	} else {
		$insertQuery = "INSERT INTO `products`(`product_name`, `buying_price`, `selling_price`, `display`) VALUES (:product_name, :buying_price, :selling_price, :display)";
		try {
			$stmt = $conn->prepare($insertQuery);
			$stmt->execute([
				':product_name' => $_POST['product_name'],
				':buying_price' => $_POST['buying_price'],
				':selling_price' => $_POST['selling_price'],
				':display' => isset($_POST['display']) ? 1 : 0
			]);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		$conn = null;
		header("Location: ../view/index.php");
	}
} else {
	echo "Please fill all the fields";
}
