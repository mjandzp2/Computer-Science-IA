<html>
	<head>
		<title>Putnam Valley Athletic Equipment Log</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
		
		
		<script>
			function validateForm() {
				let eMailVal = document.forms["LogIn"]["EmailAddress"].value
				let password = document.forms["LogIn"]["Password"].value
		
				if (eMailVal == "" || password == "") {
					alert("All areas must be filled out");
					return false;
				} else {
					return true;
				}
			}
		</script>
	</head>
	
	<body>
		<h1>Putnam Valley Athletic Equipment Log</h1>
		
		<h2>Log in with your account to begin use</h2>
		
		<form name="LogIn" method="POST" action="<?php $_PHP_SELF ?>" onsubmit="return validateForm()">
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
			<input type="submit" value="Log In">
		</form>
		
		
		<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "AccountInfo";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$Email = $_POST["EmailAddress"];
		$Password = $_POST["Password"];
		$Sport = $_POST["Sport"];
		

		if ($conn->connect_error) {
			die("Connection failed: ".$conn->connect_error);
		}
		
		session_start();
		
		$_SESSION["email"] = $Email;
		$_SESSION["sport"] = $Sport;
		
		$sql = "SELECT Email, SecretPassword, Sport FROM AccountInfo WHERE Email = '$Email' AND SecretPassword = '$Password' AND Sport = '$Sport'";
		
		if ($Email == "" || $Password == "") {
			echo "All areas need to be filled out";
		} else if ($result = $conn->query($sql)) {
			if ($result->num_rows != 0){
	 			echo "Logged in Successfully";
				header('Location: homepage.php');
			} else {
				echo "Failed to Log in";
			}
	 	}
		
	 	$conn->close();
		
		?>
		<br><br>
		<a href="AccountCreation.php">Click here to create an account</a>
		
	</body>
</html>