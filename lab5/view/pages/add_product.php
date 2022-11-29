<!-- // Code for lab 5 task A by Mushfiqur Rahman Abir - 20-42738-1 -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
	<link rel="stylesheet" href="../scss/add.css">
</head>

<body>
	<h2>
		Add Product
	</h2>
	<div class="formCon">
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
			<input type="checkbox" name="display" id="display">
			<label for="display">Display</label>
			<br>
			<input type="submit" value="Save">
		</form>
	</div>

	<a href="../index.php">Go Homepage</a>
</body>

</html>