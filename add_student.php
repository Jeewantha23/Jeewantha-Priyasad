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


if (isset($_POST['add_student'])) {
	$username=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	 $usertype="student";
	$password=$_POST['password'];

	$check="SELECT * FROM user WHERE username='$username' ";

	$check_user=mysqli_query($data,$check);

	$row_count=mysqli_num_rows($check_user);

	if ($row_count==1) {

		 echo " <script type='text/javascript'>

     alert('Username Already Exist. Try Another One');
      </script>";

	
	}
   else{



    $sql="INSERT INTO user(username,phone,email,usertype,password) VALUES ('$username','$phone','$email','$usertype','$password')";

    $result=mysqli_query($data,$sql);

    if ($result) {
      echo " <script type='text/javascript'>

     alert('Data Upload Success');
      </script>";
    }
    else{
    	echo "Upload Failled";
    }
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
   		text-align: center;
   		width: 100px;
   		padding-top: 10px;
   		padding-bottom: 10px;
   	}
   	.div_deg{
   		background-color: skyblue;
   		width: 400px;
   		padding-top: 70px;
   		padding-bottom: 70px;

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
	<h1>Add Student</h1>
        <div class="div_deg">
        	<form action="" method="POST">
        		<div>

        			<label>Username:</label>
        			<input type="text" name="name">
        		</div>

        		<div>

        			<label>Phone:</label>
        			<input type="number" name="phone">
        		</div>

        		<div>

        			<label>Email:</label>
        			<input type="email" name="email">
        		</div>

        		<div>

        			<label>Password:</label>
        			<input type="password" name="password">
        		</div><br>

        		<div>

        			
        			<input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
        		</div>
        		


        	</form>
        </div>
	</center>
</div>

</body>
</html>