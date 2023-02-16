<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/stylesheet2.css"/>
		
		<title>Account Creation</title>
		<link rel="icon" href="css/PVicon.png">
		
		<script>
			function validateForm() {
				let fNameVal = document.forms["myForm"]["FirstName"].value
				let lNameVal = document.forms["myForm"]["LastName"].value
				let pNumVal = document.forms["myForm"]["PhoneNumber"].value
				let eMailVal = document.forms["myForm"]["EmailAddress"].value
				let password = document.forms["myForm"]["Password"].value
				
				if (fNameVal == "" || lNameVal == "" || pNumVal == "" || eMailVal == "" || password == "") {
					alert("All areas must be filled out");
					return false;
				} else if (!(eMailVal.includes("@") && eMailVal.includes("."))) {
					alert("Email must be filled out with a valid email address");
					return false;
				} else if (pNumVal.length() != 10) {
					alert("Must be a valid phone number");
					return false;
				} else if (password.length() < 8) {
					alert("Password must be at least 8 characters long");
				} else {
					return true;
				}
			}
		</script>
	</head>
	
	<body>
		<h1>Create an Account on this page</h1>
		
 		<form name="myForm" method="POST" action="<?php $_PHP_SELF ?>" onsubmit="return validateForm()">
 			<label for="FirstName"> Firstname: </label>
 			<input class="input" type="text" id="FirstName" name="FirstName"> <br><br>
 			<label for="LastName"> Lastname: </label>
 			<input class="input" type="text" id="LastName" name="LastName"> <br><br>
 			<label for="PhoneNumber"> Phone Number: </label>
 			<input class="input" type="text" id="PhoneNumber" name="PhoneNumber"> <br><br>
 			<label for="EmailAddress"> Email: </label>
 			<input class="input" type="text" id="EmailAddress" name="EmailAddress"> <br><br>
			<label for="Password"> Password: </label>
			<input class="input" type="text" id="Password" name="Password"> <br><br>
			<label for="Sport"> Sport: </label>
			<select id="Sport" name="Sport">
				<option value="Cross Country">Cross Country</option>
				<option value="Volleyball">Volleyball</option>
				<option value="Football">Football</option>
				<option value="Field Hockey">Field Hockey</option>
				<option value="Boys Soccer">Boys Soccer</option>
				<option value="Girls Soccer">Girls Soccer</option>
				<option value="Boys Basketball">Boys Basketball</option>
				<option value="Girls Basketball">Girls Basketball</option>
				<option value="Wrestling">Wrestling</option>
				<option value="Indoor Track and Field">Indoor Track and Field</option>
				<option value="Boys Lacrosse">Boys Lacrosse</option>
				<option value="Girls Lacrosse">Girls Lacrosse</option>
				<option value="Baseball">Baseball</option>
				<option value="Softball">Softball</option>
				<option value="Outdoor Track and Field">Outdoor Track and Field</option>
			</select><br><br>
			<input type="submit" value="Create Account">
 		</form>
		
		<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "AccountInfo";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$FName = $_POST["FirstName"];
		$LName = $_POST["LastName"];
		$PNumber = $_POST["PhoneNumber"];
		$Email = $_POST["EmailAddress"];
		$Sport = $_POST["Sport"];
		$Password = $_POST["Password"];

		if ($conn->connect_error) {
			die("Connection failed: ".$conn->connect_error);
		}

		$sql = "INSERT INTO AccountInfo (FirstName, LastName, PhoneNumber, Email, SecretPassword, Sport, AdminStatus) Values ('$FName','$LName','$PNumber','$Email', '$Password', '$Sport', 0)";
		
		$duplicateSearch = "SELECT * FROM AccountInfo WHERE PhoneNumber = '$PNumber' OR Email = '$Email'";
		
		if ($FName == "" || $LName == "" || $PNumber == "" || $Email == "" || $Password == '') {
			echo "All areas need to be filled out";
		} else if ($result = $conn->query($duplicateSearch)) {
			if($result->num_rows > 0) {
				echo "Cannot Create Duplicate Account";
			} else if ($conn->query($sql) === TRUE) {
	 			echo "New account created successfully";
				header('Location: index.php');
	 		}
		}
		
	 	$conn->close();
		
		?>
		
		<br><br>
		<a href="index.php">Click here to return to home page</a>
		
	</body>
</html>