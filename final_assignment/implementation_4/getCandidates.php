<?php
// get the candidate data from the database using the passed education level using AJAX

// connect to the database
$conn = new mysqli('localhost', 'abir', '12918', 'ezrecruit');

// get the education level from the get request
$educationLevel = $_GET['q'];

// get the candidates from the database
$sql = $conn->prepare("SELECT * FROM candidates WHERE education = ?");
$sql->bind_param("s", $educationLevel);
$sql->execute();
$result = $sql->get_result();

// if there are candidates
if (!empty($result)) {
	// print the candidates
	foreach ($result as $candidate) {
		echo "<li>{$candidate['email']}</li>";
	}
}
