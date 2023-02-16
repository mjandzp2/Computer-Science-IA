<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/stylesheet2.css"/>
		
		<title>Michael's Pop</title>
	</head>
	
	<body>
		<h1>Here is the Pop Selection of the music website!</h1>
		<h2>This is the list of Pop:</h2>
		
		<?php
					$count = 1;
		
					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "Music";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if ($conn->connect_error) {
						die("Connection failed: ".$conn->connect_error);
					}

					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.PopMusic";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br>";
							
							if ($count == 1) {
								echo "<img src='Pop_Images/1.jpg'>";
							} else if ($count == 2) {
								echo "<img src='Pop_Images/2.jpg'>";
							} else if ($count == 3) {
								echo "<img src='Pop_Images/3.jpg'>";
							} else if ($count == 4) {
								echo "<img src='Pop_Images/4.jpg'>";
							} else if ($count == 5) {
								echo "<img src='Pop_Images/5.jpg'>";
							}
							
							echo "<br><br><br><br>";
							
							$count = $count + 1;
						}
					}

					$conn->close();
				?> <br><br><br>
				
		<a href="/index.php">Return to the Home Page!</a>
		
	</body>
</html>