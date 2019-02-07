
<?php
$servername = "localhost";
$user = "root";
$password = "";
$db ="game";
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password1 = $_POST['password'];
	$email = $_POST['email'];}
// Create }}connection
$conn = mysqli_connect($servername, $user,$password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO users ( username, password, email)
VALUES ('$username', '$password1', '$email');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	 header('location: try31.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>