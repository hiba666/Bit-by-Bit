<?php
session_start();

// initializing variables
// $username = "";
// $email    = "";
// $name    = "";
// $password    = "";
$errors = array(); 



// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'game');




$username = mysqli_real_escape_string($db, $_GET['username']);
  $email = mysqli_real_escape_string($db, $_GET['email']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  


// REGISTER USER
if (isset($_GET['submit'])) {

  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_GET['username']);
  $email = mysqli_real_escape_string($db, $_GET['email']);
  $password = mysqli_real_escape_string($db, $__GET['password']);
  echo $username;
echo $password;
echo $email;
 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  
  if (empty($password)) { array_push($errors, "Password is required"); }
 
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
echo $username;
echo $password;
echo $email;


 $query = "INSERT INTO users (`username`, `password`, `email`) 
          VALUES('$username', '$password','$email')";
    mysqli_query($db, $query);
  mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: a.html');
  


// ... 

// LOGIN USER
if (isset($_GET['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: a.html');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>