<?php 
include 'dbconnect.php';

$updateid=$_GET['edit'];

$query = "SELECT * FROM category WHERE category_id ='".$updateid."'";
$result = mysqli_query($conn,$query) or die (mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
	$categoryname=$_POST['category'];
	$categoryid=$_POST['id'];
	$sql = "UPDATE category SET category_name='$categoryname' WHERE category_id =$categoryid";
	if(mysqli_query($conn,$sql)){
		header("Location: addc.php");
	} else {
		echo "Error updating record: "
	.	mysqli_error($conn);
	}
	mysqli_close($conn);
}

?>

<form method="post" action="">
<div class="input-group"><input type="hidden" name="id" value="<?php echo $row['category_id']; ?>"></div>
<div class="input-group">
	<label>Category Name: </label>
	<input type="text" name="category" value="<?php echo $row['category_name']; ?>">
</div>
<div class="input-group">
	<button class="btn" type="submit" name="update">Update</button>
</div>
</form>
