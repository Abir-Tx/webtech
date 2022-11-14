<!-- // Code for lab 5 task A by Mushfiqur Rahman Abir - 20-42738-1 -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
</head>

<body>
	<form action="../../controller/create_product.php" method="POST">
		<label for="product_name">Name</label>
		<input type="text" name="product_name" id="product_name" required>
		<br>
		<label for="buying_price">Buying Price</label>
		<input type="number" name="buying_price" id="buying_price" required>
		<br>
		<label for="selling_price">Selling Price</label>
		<input type="number" name="selling_price" id="selling_price" required>
		<br>
		<input type="submit" value="Save">
	</form>
</body>

</html>