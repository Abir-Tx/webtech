<?php
@include_once "../model/db_connect.php";
$conn = db_conn();
$id = $_POST['id'];
$name = $_POST['name'];
$buyingPrice = $_POST['buyingPrice'];
$sellingPrice = $_POST['sellingPrice'];
$updateQuery = "UPDATE `products` SET `product_name` = '$name', `buying_price` = '$buyingPrice', `selling_price` = '$sellingPrice' WHERE `id` = '$id'";
try {
	$stmt = $conn->query($updateQuery);
} catch (PDOException $e) {
	echo $e->getMessage();
}
header("Location: ../view/pages/view_product.php");
