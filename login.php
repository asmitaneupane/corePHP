<?php
include 'dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT user_id FROM tbl_user WHERE user_name = '$username' and password = '$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);
	

	if($count == 1){
		$_SESSION['login_user'] = $username;

		header("location: index.php");
	}else{
		$error = "Your Login Name or Password is Invalid";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="" method="POST">
	UserName: <input type="text" name="username" placeholder="username"><br>
	Password: <input type="Password" name="password" placeholder="password"><br>
	<button type="submit" value="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>