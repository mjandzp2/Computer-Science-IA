<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/stylesheet2.css"/>
		
		<title>Michael's Hip Hop</title>
	</head>
	
	<body>
		<h1>Here is the Hip Hop Selection of the music website!</h1>
		<h2>This is the list of Hip Hop:</h2>
		
		<?php
					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "Music";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if ($conn->connect_error) {
						die("Connection failed: ".$conn->connect_error);
					}

					$sql = "SELECT SongName, Artist, ReleaseYear FROM Music.HipHop";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "Song Name: ".$row["SongName"]."<br> Artist: ".$row["Artist"]."<br>Release Year: ".$row["ReleaseYear"]."<br><br>";
						}
					}

					$conn->close();
				?><br><br><br>
				
				
		<a href="/index.php">Return to the Home Page!</a>
		
	</body>
</html>