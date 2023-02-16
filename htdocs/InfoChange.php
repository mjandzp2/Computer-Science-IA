<html>
	<head>
		<title>Change Account Info</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
		
		
		<script>
			function validateForm() {
				let eMailVal = document.forms["myForm"]["EmailAddress"].value
				let password = document.forms["myForm"]["Password"].value
				let sport = document.forms["myForm"]["Sport"].value
		
				if (eMailVal == "" || password == "" || sport == "") {
					alert("All areas must be filled out");
					return false;
				} else {
					return true;
				}
			}
		</script>
	</head>
	
	<body>
	<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "AccountInfo";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: ".$conn->connect_error);
	}
	
	session_start();
	
	$idEmail = $_SESSION["email"];
	
	$FirstName;
	$LastName;
	$PNumber;
	$Email;
	$SecretPassword;
	$Sport;
	
	$getAccountInfo = "SELECT * FROM AccountInfo WHERE Email = '$idEmail'";
	$result = $conn->query($getAccountInfo);

	// This Gets the values of the account from the database:
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$FirstName = $row["FirstName"];
			$LastName = $row["LastName"];
			$PNumber = $row["PhoneNumber"];
			$EmailAddress = $row["Email"];
			$SecretPassword = $row["SecretPassword"];
			$Sport = $row["Sport"];
	  	}
	} else {
	  	echo "0 results";
	}
	
 	$conn->close();
	
	?>
		
		<h1>Change Account Info</h1>
		<br><br>
		
 		<form name="myForm" method="POST" action="<?php $_PHP_SELF ?>" onsubmit="return validateForm()">
 			<label for="FirstName"> Firstname: </label>
 			<input class="input" type="text" id="FirstName" name="FirstName" value="<?php echo $FirstName; ?>"> <br><br>
 			<label for="LastName"> Lastname: </label>
 			<input class="input" type="text" id="LastName" name="LastName" value="<?php echo $LastName; ?>"> <br><br>
 			<label for="PhoneNumber"> Phone Number: </label>
 			<input class="input" type="text" id="PhoneNumber" name="PhoneNumber" value="<?php echo $PNumber; ?>"> <br><br>
 			<label for="EmailAddress"> Email: </label>
 			<input class="input" type="text" id="EmailAddress" name="EmailAddress" value="<?php echo $EmailAddress; ?>"> <br><br>
			<label for="Password"> Password: </label>
			<input class="input" type="text" id="Password" name="Password" value="<?php echo $SecretPassword; ?>"> <br><br>
			<label for="Sport"> Sport: </label>
			<select id="Sport" name="Sport">
				<option value="">Select a Sport</option>
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
			<input type="submit" value="Update Account Info">
 		</form>
		
		<a href="homepage.php"><button class="button">Return to the Home Page</button></a>
		
		<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "AccountInfo";

		$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) {
			die("Connection failed: ".$conn->connect_error);
		}
	
		session_start();
	
		$idEmail = $_SESSION["email"];
	
		$newFirstName = $_POST["FirstName"];
		$newLastName = $_POST["LastName"];
		$newPNumber = $_POST["PhoneNumber"];
		$newEmail = $_POST["EmailAddress"];
		$newSecretPassword = $_POST["Password"];
		$newSport = $_POST["Sport"];
	
		$UpdateInfo = "UPDATE `AccountInfo` SET `FirstName`='$newFirstName',`LastName`='$newLastName',`PhoneNumber`='$newPNumber',`Email`='$newEmail',`SecretPassword`='$newSecretPassword',`Sport`='$newSport',`AdminStatus`=0 WHERE Email = '$idEmail'";
		
		$getPastInfo = "SELECT * FROM 'AccountInfo' WHERE Email = '$newEmail' OR PNumber = '$newPNumber'";
		
		$pastInfo = $conn->query($getPastInfo);
		
		if ($newFirstName != "" && $newLastName != "" && $newPNumber != "" && $newEmail != "" && $newSecretPassword != "" && $newSport != "") {
			$result = $conn->query($UpdateInfo);
			$_SESSION["email"] = $newEmail;
			header('Location: homepage.php');
		}
		

		
	
	 	$conn->close();
	
		?>
	</body>
	
	
</html>