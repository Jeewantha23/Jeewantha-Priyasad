<?php
session_start();
error_reporting(0);

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

if ($_GET['lecturer_id'])
 {

   $t_id=$_GET['lecturer_id'];

   $sql="SELECT * FROM lecturer WHERE id='$t_id' " ;

   $result=mysqli_query($data,$sql);

   $info=$result->fetch_assoc();	
}


if (isset($_POST['update_lecturer'])){

$id=$_POST['id'];	
$t_name=$_POST['name'];
$t_des=$_POST['description'];
$file=$_FILES['image'] ['name'];
$dst="./image/".$file;

$dst_db="image/".$file;

move_uploaded_file($_FILES['image']['tmp_name'],$dst);

if ($file)
 {
$sql2="UPDATE lecturer SET name='$t_name',description='t_des',image='$dst_db' WHERE id='$id' ";
}
else{
	$sql2="UPDATE lecturer SET name='$t_name',description='t_des', WHERE id='$id' ";
}



$result2=mysqli_query($data,$sql2);

if($result2){
   header('location:admin_view_lecturer.php');


}
}

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	
	<?php
   include 'admin_css.php';


   ?>

   <style>
   	.content{
    text-align: center;
   	}
 label{
 	display: inline-block;
 	width: 150px;
 	text-align: right;
 	padding-top: 10px;
 	padding-bottom: 10px;
 }
 .form_deg{
 	background-color: skyblue;
 	width: 600px;
 	padding-top: 70px;
 	padding-bottom: 70px;
 }
.with_deg{
	width: 100px;
	height: 100px;
}	
   </style>

</head>
<body>
<?php
    include 'admin_sidebar.php';



	?>

<br>
<div class="content">
	<h1>Update Lecturer Data</h1><br><br>

	<center>
		<form class="form_deg" action="admin_update_lecturer.php" method="POST" enctype="multipart/form-data">

			<input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>

			<div>
				<label>Lecturer Name</label>
				<input type="text" name="name"
				 value="<?php echo "{$info['name']}" ?>">
			</div>


			<div>
				<label>About Lecturer</label>
			<textarea name="description" >
				<?php echo "{$info['description']}" ?>
			</textarea>
			</div>


			<div>
				<label>Lecturer Old Image</label>
				<img src="<?php echo "{$info['image']}" ?>" class="with_deg">
			</div>


			<div>
				 <label>Choose Lecturer New Image</label><br>
				<input type="file" name="image">
			</div><br>

			<div>
			
				<input type="submit" name="update_lecturer" class="btn btn-success">
			</div>
		
		</form>
	</center>

	
</div>

</body>
</html>