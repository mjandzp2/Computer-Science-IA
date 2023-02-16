<html>
	<head>
		<title>Equipment Return</title>
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
		<h1>Return Equipment</h1>
		<br><br>
		<h2>Here is a report of the equipment logged:</h2>
		
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
		$sport = $_SESSION["sport"];
		
		$sql = "SELECT * FROM `EquipmentUsed` WHERE `Sport` = '$sport'";
		
		$results = $conn->query($sql);
		
		echo 
		"<table>
			<tr>
				<th>Equipment Type           .</th>
				<th>Quantity</th>
			</tr>";
			
			
			while ($row = $results->fetch_assoc()) {
				echo "<tr><td>".$row['EquipmentType']."</td><td>".$row[Quantity]."</td></tr>";
			}
			
			
		echo "</table>";
		
		?><br><br>
		
		<form method="POST">
			<input type="submit" name="button1" value="Return Equipment" class="button" />
		</form>
		
		<?php 
		
			if (isset($_POST['button1'])) {
				$setOne = "UPDATE `EquipmentUsed` SET `Returned`='1' WHERE `Sport` = '$sport'";
			
				if ($conn->query($setOne) === TRUE) {
					echo "Successfully Returned Equipment";
				}
			}
		
		?><br><br>
		
		<a href="homepage.php"><button class="button">Return to the Home Page</button></a>
	</body>
</html>