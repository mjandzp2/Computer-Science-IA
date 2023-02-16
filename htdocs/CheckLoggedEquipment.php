<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
	</head>
	
	<body>
		<h1>Check all logged equipment on this page</h1>
		<br><br>
		
		<form name="LogIn" method="POST" action="<?php $_PHP_SELF ?>">
			<label for="Sport"> Select the Sport you would like to view: </label>
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
			<input type="submit" value="Submit">
		</form>
		<br><br>
	
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
		$sport = $_POST["Sport"];
		
		$sql = "SELECT * FROM `EquipmentUsed` WHERE `Sport` = '$sport'";
		
		$results = $conn->query($sql);
		
		if ($results->num_rows > 0) {
			echo 
			"<table>
				<tr>
					<th>Equipment Type         .</th>
					<th>Quantity             .</th>
					<th>Sport</th>
				</tr>";
				
				
				while ($row = $results->fetch_assoc()) {
					echo "<tr><td>".$row['EquipmentType']."</td><td>".$row[Quantity]."</td><td>".$row[Sport]."</td></tr>";
				}
				
			
				echo "</table>";
		}
		
		?>
	
		<br><br>
		<a href="homepage.php"><button class="button"> Return to Home Page </button></a>
	</body>
</html>