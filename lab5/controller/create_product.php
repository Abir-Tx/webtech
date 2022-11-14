<?php
@require_once "../model/db_connect.php";

if (isset($_POST['product_name']) && isset($_POST['buying_price']) && isset($_POST['selling_price'])) {
	$conn = db_conn();
	$selectQuery = "INSERT INTO `products` (`product_name`, `buying_price`, `selling_price`) VALUES (:product_name, :buying_price, :selling_price)";
	try {
		$stmt = $conn->prepare($selectQuery);
		$stmt->execute([
			':product_name' => $_POST['product_name'],
			':buying_price' => $_POST['buying_price'],
			':selling_price' => $_POST['selling_price']
		]);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	$conn = null;
	header("Location: ../view/index.php");
} else {
	echo "Please go back and try again!";
}
