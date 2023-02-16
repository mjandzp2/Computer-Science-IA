<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/stylesheet2.css"/>
		
		<title>Equipment Log</title>
		<link rel="icon" href="css/PVicon.png">
		
		<script>
			function validateForm() {
				let fNameVal = document.forms["myForm"]["FirstName"].value
				let lNameVal = document.forms["myForm"]["LastName"].value
				let pNumVal = document.forms["myForm"]["PhoneNumber"].value
				let eMailVal = document.forms["myForm"]["EmailAddress"].value
				
				if (fNameVal == "" || lNameVal == "" || pNumVal == "" || eMailVal == "") {
					alert("All areas must be filled out");
					return false;
				} else if (eMailVal.includes("@") && eMailVal.includes(".")) {
					alert("Email must be filled out with a valid email address")
					return false;
				} else {
					return true;
				}
			}
			
			
		</script>
	</head>
	
	<body>
		<h1 id="boys">Here is the homepage to the music website!</h1>
		

		<h2>Click any of the buttons below to select the genre you want to see:</h2>
		<button class="button" onclick="location.href='genres/Jazz.php';" >Visit Jazz.com!</button><br><br>
		<button class="button" onclick="location.href='genres/Pop.php';">Visit Pop.com!</button><br><br>
		<button class="button" onclick="location.href='genres/HipHop.php';">Visit HipHop.com!</button><br><br>
		<button class="button" onclick="location.href='genres/Classical.php';">Visit Classical.com!</button><br><br>
		<button class="button" onclick="location.href='genres/Rock.php';">Visit Rock.com!</button><br><br>
		<button class="button" onclick="location.href='https:\/\/www.youtube.com/watch?v=dQw4w9WgXcQ';">Visit the info page!</button>
		

		<h2> Or you can search for specific songs here: </h2>
		
		<form method="POST" action="<?php $_PHP_SELF ?>">
			<label for="songTitle"> Song Title: </label>
			<input type="text" id="songTitle" name="songTitle">
			<input type="submit" value="Search">
		</form>
		
		<div class="phpstuff"><?php
					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "Music";
					$foundResults = 0;

					$conn = new mysqli($servername, $username, $password, $dbname);
			
					$songName = $_POST["songTitle"];
					$genreName = $_POST["genreName"];

					if ($conn->connect_error) {
						die("Connection failed: ".$conn->connect_error);
					}

					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.Jazz WHERE SongName = "."\"".$songName."\"";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br><br>";
						}
						$foundResults = 1;
					}
			
					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.Classical WHERE SongName = "."\"".$songName."\"";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br><br>";
						}
						$foundResults = 1;
					}
			
					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.HipHop WHERE SongName = "."\"".$songName."\"";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br><br>";
						}
						$foundResults = 1;
					}
			
					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.PopMusic WHERE SongName = "."\"".$songName."\"";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br><br>";
						}
						$foundResults = 1;
					}
			
					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.Rock WHERE SongName = "."\"".$songName."\"";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br><br>";
						}
						$foundResults = 1;
					}
			
					if ($foundResults != 1) {
						echo "No Results Found";
					}

					$conn->close();
				?> </div>

		
		<h3>Fill out this form to get updates on songs in the future:</h3>
		
 		<form name="myForm" method="POST" action="<?php $_PHP_SELF ?>" onsubmit="return validateForm()">
 			<label for="FirstName"> Firstname: </label>
 			<input class="input" type="text" id="FirstName" name="FirstName"> <br><br>
 			<label for="LastName"> Lastname: </label>
 			<input class="input" type="text" id="LastName" name="LastName"> <br><br>
 			<label for="PhoneNumber"> Phone Number: </label>
 			<input class="input" type="text" id="PhoneNumber" name="PhoneNumber"> <br><br>
 			<label for="EmailAddress"> Email: </label>
 			<input class="input" type="text" id="EmailAddress" name="EmailAddress"> <br><br>
			<input type="submit" value="Submit">
 		</form>
		
	 <?php
	 	$servername = "localhost";
		$username = "root";
	 	$password = "root";
		$dbname = "AccountInfo";
		
		$FirstName = $_POST["FirstName"];
		$LastName = $_POST["LastName"];
		$PhoneNumber = $_POST["PhoneNumber"];
		$EmailAddress = $_POST["EmailAddress"];

		 
		$conn = new mysqli($servername, $username, $password, $dbname);
		

	 	if ($conn->connect_error) {
	 	   	die("Connection failed: " . $conn->connect_error);
	 	}

		$sql = "INSERT INTO Contact (firstname, lastname, phonenumber, email)
		VALUES ('".$FirstName."', '".$LastName."','".$PhoneNumber."', '".$EmailAddress."')";
		
		echo $conn->query($sql);

		if ($FirstName == "" || $LastName == "" || $PhoneNumber == "" || $EmailAddress == "") {
			echo "All areas need to be filled out";
		} else if ($conn->query($sql) === TRUE) {
	 		echo "New record created successfully";
	 	}
		
	 	$conn->close();
	 ?>
	 
	</body>
</html>