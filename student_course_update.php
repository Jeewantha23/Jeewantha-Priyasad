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

$id=$_GET['stuid'];

$sql="SELECT * FROM course1 WHERE StudentID='$id' ";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if (isset($_POST['update_course'])) {


$st=$_POST['stuid'];
$cor=$_POST['corid'];
$sor_name=$_POST['corname'];


$query="UPDATE course1 SET StudentID='$st',CourseID='$cor',CourseName='$sor_name' WHERE StudentID='$id' ";

$result2=mysqli_query($data,$query);

if ($result2) {
	header('location:view_student_course.php');
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
	<h1>Update Student Course</h1><br>

	<div class="div_deg">
        	<form action="#" method="POST">
        		
        		<div>

        			<label>StudentID</label>
        			<input type="number" name="stuid" value="<?php echo "{$info['StudentID']}"; ?>">
        		</div>

        		<div>

        			<label>CourseID</label>
        			<input type="number" name="corid" value="<?php echo "{$info['CourseID']}"; ?>">
        		</div>

        		<div>

        			<label>CourseName</label>
        			<input type="text" name="corname" value="<?php echo "{$info['CourseName']}"; ?>">
        		</div><br>


        		<div>

        			<input type="submit" class="btn btn-success" name="update_course" value="Update Course">
        		</div>

        			
        		


        	</form>
        </div>

</center>


	
</div>

</body>
</html>