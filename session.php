<?php
include 'dbconnect.php';
$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn,"select user_name from tbl_user where user_name = '$user_check'");

$row = mysqli_fetch_array($se4s_sql);

$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
	header("location:login.php");
	die();
}
?>