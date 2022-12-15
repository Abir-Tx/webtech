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
		echo "<table> <tr> <th>First Name</th> <th>Last Name</th> <th>Education</th> <th>Ratings</th> <th>Skills</th> </tr> <tr> <td>" . $candidate["fname"] . "</td> <td>" . $candidate["lname"] . "</td> <td>" . $candidate["education"] . "</td> <td>" . $candidate["ratings"] . "</td> <td>" . $candidate["skills"] . "</td> </tr> </table>";
	}
}
