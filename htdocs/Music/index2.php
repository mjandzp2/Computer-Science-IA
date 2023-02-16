<html>

	<head>
		<title>Contact Infox</title>
	</head>

	<body>
		
		<h1> This Website is for Contact Information </h1>
	
		
		<form method="POST" action="<?php $_PHP_SELF ?>">
			<label for="FirstName"> Firstname: </label>
			<input type="text" id="FirstName" name="FirstName">
			<label for="LastName"> Lastname: </label>
			<input type="text" id="LastName" name="LastName">
			<label for="PhoneNumber"> Phone Number: </label>
			<input type="text" id="PhoneNumber" name="PhoneNumber">
			<label for="EmailAddress"> Email: </label>
			<input type="text" id="EmailAddress" name="EmailAddress">
		</form>
	
		 <?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "ContactInfo";
			
			$FirstName = $_POST["FirstName"];
			$LastName = $_POST["LastName"];
			$PhoneNumber = $_POST["PhoneNumber"];
			$Email = $_POST["EmailAddress"];

			
			$conn = new mysqli($servername, $username, $password, $dbname);
		
			if ($conn->connect_error) {
				die("Connection failed: ".$conn->connect_error);
			}
			
			$sql = "INSERT INTO 'Contact' VALUES (".$FirstName.",".$LastName.",".$PhoneNumber",".$Email.");"
		
		?>
	
	</body>
	
</html>