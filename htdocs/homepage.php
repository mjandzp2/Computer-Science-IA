<html>
	<head>
			<title>Home Page</title>
			<link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
	</head>
	
	<body>
		<h1>Home Page</h1>
		<br>
		<h2>Log your equipment usage below</h2>
		<br>
		<h3>Select which action you would like to perform:</h3>
		<br>
		<a href="LogEquipmentUsage.php"><button class="button">Log Equipment Usage</button></a>
		<br><br>
		<a href="EquipmentReturn.php"><button class="button">Return Equipment</button></a>
		<br><br>
		<a href="InfoChange.php"><button class="button">Change Account Info</button></a>
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
		
			$emailAddress = $_SESSION["email"];
		
			$sql = "SELECT * FROM `AccountInfo` WHERE `Email` = '$emailAddress' AND `AdminStatus` = 1";
		
			if ($results = $conn->query($sql)) {
				if ($results->num_rows > 0) {
					echo "<a href=\"CheckLoggedEquipment.php\" data-show-if=><button class=\"button\">Check All Logged Equipment</button></a><br><br>";
				}
			}
		
	 		$conn->close();
		
		?>
		
		<a href="index.php"><button class="button">Log Out</button></a>
		<br><br>
	</body>
</html>