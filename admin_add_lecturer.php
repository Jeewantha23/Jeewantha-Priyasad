<?php
session_start();

if (!isset($_SESSION['username'])) {

	header("location:login.php");
}
elseif($_SESSION['usertype']=='student')
{
    header("location:login.php");

}


$hostname="localhost";
$user="root";
$password="";
$db="schoolproject1";

$data=mysqli_connect($hostname,$user,$password,$db);

if (isset($_POST['add_lecturer'])) {
	$l_name=$_POST['name'];
	$d_name=$_POST['description'];
	$file=$_FILES['image']['name'];

	$dst="./image/" .$file;

	$dst_db="image/".$file;

	move_uploaded_file($_FILES['image']['tmp_name'],$dst );

	$sql="INSERT INTO lecturer (name,description,image) VALUES
	 ('$l_name','$d_name','$dst_db')";

	 $result=mysqli_query($data,$sql);

	 if ($result) {
	 header('location:admin_add_lecturer.php');
    
	 }



}
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<style>
	.div_deg{
		background-color: lightsalmon;
		padding-top: 70px;
		padding-bottom: 70px;
		width: 500px;

	}	

	</style>
	
	<?php
   include 'admin_css.php';


   ?>

   <style>
   	.content{
    text-align: center;
   	}
   </style>
</head>
<body>
<?php
    include 'admin_sidebar.php';



	?>

<br>
<div class="content">

	<center>
	<h1>Add Lecturer</h1><br><br>


	<div class="div_deg">
		<form action="#" method="POST" enctype="multipart/form-data">

			<div>
				<label>Lecturer Name:</label>
				<input type="text" name="name">
			</div>
			<br>

			<div>
				<label>Description:</label>
				<textarea name="description"></textarea>
			</div>
			<br>

			<div>
				<label>Image:</label>
				<input type="file" name="image">
			</div>
			<br>

			<div>
				
				<input type="submit" name="add_lecturer" value="Add Lecturer" class="btn btn-primary">
			</div>

		</form>
	</div>
   </center>
	
</div>

</body>
</html>