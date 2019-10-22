<?php 
include 'dbconnect.php';

$deleteid=$_GET['del'];

$query = "DELETE FROM category WHERE category_id = $deleteid";
$result = mysqli_query($conn,$query) or die (mysqli_error());
header("Location: addc.php");

mysqli_close($conn);
?>