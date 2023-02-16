<html>
	<head>
		<title>Log Equipment Usage</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
		
		
		<script>
			function validateFormLog() { //For Logging equipment only
				let Eq = document.forms["LogEq"]["Equipment"].value
				let Qu = document.forms["LogEq"]["Quantity"].value
		
				if (Eq == "" || Qu == "") {
					alert("All areas must be filled out");
					return false;
				} else {
					return true;
				}
			}
			
			function validateFormDel() { // For deleting equipment only
				let Eq = document.forms["LogDel"]["RemovedEquipment"].value
		
				if (Eq == "") {
					alert("All areas must be filled out");
					return false;
				} else {
					return true;
				}
			}
		</script>
	</head>
	
	<body>
		<h1>Log Equipment Usage Here</h1>
		<br><br>
		<h3>Log New Equipment Here:</h3>
		<form name="LogEq" method="POST" action="<?php $_PHP_SELF ?>" onsubmit="return validateFormLog()">
		 	<label for="Equipment"> Equipment Type: </label>
		 	<input class="input" type="text" id="Equipment" name="Equipment"> <br><br>
			<label for="Quantity"> Quantity: </label>
			<input class="input" type="text" id="Quantity" name="Quantity"> <br><br>
			<input type="submit" value="Submit">
		</form>
		
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
			
			$EquipmentType = $_POST["Equipment"];
			$Quantity = $_POST["Quantity"];
			$Sport = $_SESSION["sport"];
			
			$sql = "INSERT INTO `EquipmentUsed`(`EquipmentType`, `Quantity`, `Sport`, `Returned`) VALUES ('$EquipmentType','$Quantity','$Sport', 0)";
			
			$checkDuplicates = "SELECT `EquipmentType`, `Sport` FROM `EquipmentUsed` WHERE `EquipmentType` = '$EquipmentType' AND `Sport` = '$Sport'";
					

			if ($result = $conn->query($checkDuplicates)) {
				if ($result->num_rows > 0) {
					echo "Cannot submit duplicates of equipment";
				} else if ($conn->query($sql) === TRUE) {
					echo "Equipment Successfully submitted";
				}
			} 
			
		?><br><br><br>
		
		<h3>Use the following to delete any inputted equipment if needed:</h3>
		<form name="LogDel" method="POST" action="<?php $_PHP_SELF ?>" onsubmit="return validateFormDel()">
		 	<label for="RemovedEquipment"> Equipment Type: </label>
		 	<input class="input" type="text" id="RemovedEquipment" name="RemovedEquipment"> <br><br>
			<input type="submit" value="Submit">
		</form>
		
		<?php
		
			$RemovedEq = $_POST["RemovedEquipment"];
			
			$sqlDel = "DELETE FROM `EquipmentUsed` WHERE `EquipmentType` = '$RemovedEq' AND `Sport` = '$Sport'";
			if ($conn->query($sqlDel) === TRUE && $RemovedEq != "") {
				echo "Successfully Deleted";
			} else {
				echo "Failed to Delete";
			}
		
		?>
		
		
		
		
		<br><br><a href="homepage.php"><button class="button">Return to the Home Page</button></a>
	</body>
</html>