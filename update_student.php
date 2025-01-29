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

$id=$_GET['student_id'];

$sql="SELECT * FROM user WHERE id='$id' ";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if (isset($_POST['update']))
 {
$name=$_POST['name'];
$phone=$_POST['phone'];	
$email=$_POST['email'];	
$password=$_POST['password'];

$query="UPDATE user SET username='$name',phone='$phone',email='$email',password='$password' WHERE id='$id' ";	

$result2=mysqli_query($data,$query);

if ($result2) {
	
header("location:view_student.php");
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
	width: 100px;
	text-align: right;
	padding-top: 10px;
	padding-bottom: 10px;
}
.div_deg{
	background-color: skyblue;
	width: 400px;
	padding-bottom: 70px;
	padding-top: 70px;
}

   </style>
</head>
<body>
<?php
    include 'admin_sidebar.php';



	?>

<br>
<div class="content">
	<h1>Update Student</h1><br>

<center>
	<div class="div_deg">
		<form action="#" method="POST">
			<div>
				<label>Username</label>
				<input type="text" name="name" value="<?php echo "{$info['username']}";  ?>">
			</div>

			<div>
				<label>Phone</label>
				<input type="number" name="phone" value="<?php echo "{$info['phone']}";  ?>">
			</div>

			<div>
				<label>Email</label>
				<input type="email" name="email" value="<?php echo "{$info['email']}";  ?>">
			</div>

			<div>
				<label>Password</label>
				<input type="password" name="password" value="<?php echo "{$info['password']}";  ?>">
			</div><br>

			<div>
		
				<input  type="submit" class='btn btn-success' name="update" value="Update">
			</div>

		</form>
</center>
	</div>

	
</div>

</body>
</html>