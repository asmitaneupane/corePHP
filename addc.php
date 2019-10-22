<?php

if(isset($_POST['save']))
{

  include 'dbconnect.php';
  $cat=$_POST['category'];
  $sql ="INSERT INTO category(category_name) VALUES ('$cat')";
if (mysqli_query ($conn, $sql)){
 echo"New category added successfully";	
}
else{
	echo"Error: ". $sql . "<br>" .mysqli_error($conn);

}
mysqli_close($conn);

}

?>

<!DOCTYPE HTML>
<html>  
<body>

<h1>Add Category Form</h1>
<form action="" method="post">
Category Name:<br> <input type="text" name="category" placeholder="please enter category"><br>
<button type="submit" name="save" class="btn btn-primary">Save</button>
</form>

<?php
include 'dbconnect.php';
$sql = 'SELECT * from category';
$result = mysqli_query($conn, $sql);

if(isset($_POST['update']))
{
	$cat =$_POST['category'];

	$sql ="SELECT * FROM category WHERE category_name LIKE '%$cat%'";
	//echo $sql; die();
	$result1 = mysqli_query($conn, $sql);
}
?>

<form method="POST" action="" style="">
	<div class="input-group">
		<h2>Please enter category name</h2>
		<input type="text" name="category" value="">
	</div>
	<div class="input-group">
		<button class="btn btn-primary" type="submit" name="update">Search</button>
	</div>
</form>

<div class="container">
	<h1>Category Details</h1></div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Category Id</th>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				if (mysqli_num_rows($result)>0) {
					while ($row = mysqli_fetch_assoc($result)) {
						?>
				<td><?php echo $row["category_id"] ?></td>
				<td><?php echo $row["category_name"] ?></td>
				<td><a href="update.php?edit=<?php echo $row['category_id']; ?>" class="btn btn-primary">Edit</a></td>
				<td><a href="delete.php?del=<?php echo $row['category_id']; ?>" class="btn btn-danger">Delete</a></td>
			</tr>
		</tbody>
					<?php } ?>
	</table>
<?php } 

if (isset($result1))
{
?>

	<h2>Search Result</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Category Id</th>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr><?php
		if (mysqli_num_rows($result1)>0) {
					while ($row = mysqli_fetch_assoc($result1)) {
						?>
				<td><?php echo $row["category_id"] ?></td>
				<td><?php echo $row["category_name"] ?></td>
				<td><a href="update.php?edit=<?php echo $row['category_id']; ?>" class="btn btn-primary">Edit</a></td>
				<td><a href="delete.php?del=<?php echo $row['category_id']; ?>" class="btn btn-danger">Delete</a></td>
			</tr>
		</tbody>
					<?php } ?>
	</table>
<?php } } ?>

</body>
</html>