<?php
$conn = new mysqli('localhost', 'abir', '12918', 'ajaxTask');
if (!empty($_POST["keyword"])) {
	$sql = $conn->prepare("SELECT * FROM country WHERE country_name LIKE  ? ORDER BY country_name LIMIT 0,6");
	$search = "{$_POST['keyword']}%";
	$sql->bind_param("s", $search);
	$sql->execute();
	$result = $sql->get_result();
	if (!empty($result)) {
?>
		<ul id="country-list">
			<?php
			foreach ($result as $country) {
			?>
				<li onClick="selectCountry('<?php echo $country["country_name"]; ?>');">
					<?php echo $country["country_name"]; ?>
				</li>
			<?php
			} // end for
			?>
		</ul>
<?php
	} // end if not empty
}
?>