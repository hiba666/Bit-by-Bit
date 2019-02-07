
<?php
$servername = "localhost";
$username = "username";
$password = "";

// Create }}connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else
{
	 header('location: try31.html');
}
$conn->close();



?>