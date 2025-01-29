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

if (isset($_POST['addcourse'])) 
{
	$student=$_POST['stuid'];
	$course=$_POST['corid'];
	$cor=$_POST['corname'];

	$sql="INSERT INTO course1(StudentID,CourseID,CourseName) VALUES ('$student','$course','$cor')";

	$result=mysqli_query($data,$sql);

	if ($result) {
		echo "<script type-='text/javascript'>
		alert('Data Upload Success');
		</script>";
	}
else{
	echo "";
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
	<h1>Add Student Course</h1><br>
        <div class="div_deg">
        	<form action="#" method="POST">
        		
        		<div>

        			<label>StudentID</label>
        			<input type="number" name="stuid">
        		</div>

        		<div>

        			<label>CourseID</label>
        			<input type="number" name="corid">
        		</div>

        		<div>

        			<label>CourseName</label>
        			<input type="text" name="corname">
        		</div><br>


        		<div>

        			<input type="submit" class="btn btn-primary" name="addcourse" value="Add Course">
        		</div>

        			
        		


        	</form>
        </div>
	</center>
</div>

</body>
</html>