<?php
// session_start()
?>

<header>
	<nav>
		<a href="/webtech/lab4/recruiterx">
			<h1>RecruiterX</h1>
		</a>

		<ul>
			<li>
				<a href="/webtech/lab4/recruiterx/index.php">Home</a>
			</li>

			<li>
				<a href="/webtech/lab4/recruiterx/pages/login.php"><?php (isset($_SESSION['uname'])) ? print("Logout") : print("Login") ?></a>
			</li>

			<li>
				<a href="/webtech/lab4/recruiterx/pages/registration.php">Registration</a>
			</li>
		</ul>
	</nav>
</header>