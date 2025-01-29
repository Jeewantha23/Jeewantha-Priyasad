<?php
error_reporting(0);
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

$sql="SELECT * FROM course1";

$result=mysqli_query($data,$sql);
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
   	 table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
td{
	background-color: lightgreen;
	padding: 15px;


}

   </style>

</head>
<body>
<?php
    include 'admin_sidebar.php';



	?>

<br>
<div class="content">
	<h1>Student View Course</h1><br>

	<?php
   if ($_SESSION['message']) {
   	echo $_SESSION['message'];
   }

   unset($_SESSION['message']);
	?>
       <center>
	  <table style="width:60px">
	  	<tr>
	  		<th>Student ID</th>
	  		<th>Course ID</th>
	  		<th>Course Name</th>
	  		<th>Delete</th>
	  		<th>Update</th>



	  	</tr>

	  	<?php
	  	while ($info=$result->fetch_assoc()) {
	  	 	
	  	 
	  	?>

	  	<tr>
	  		<td>
	  			<?php echo "{$info['StudentID']}"; ?>
	  		</td>
	  		<td>
	  			<?php echo "{$info['CourseID']}"; ?>
	  				
	  			</td>

	  		<td>
	  	  <?php echo "{$info['CourseName']}"; ?>
	  	   </td>


	  		<td>
	  	  <?php echo "  <a  class='btn btn-danger' onClick=\" javascript:return confirm('Are Your Sure to Delete This ');\" href='course_delete.php?stuid={$info['StudentID']}'>Delete</a>"; ?>
	  	   </td>

	  	   <td>
	  			<?php echo "<a  class='btn btn-success' href='student_course_update.php?stuid={$info['StudentID']}'>Update</a>"; ?>
	  				
	  			</td>

	  	</tr>
	  	<?php
	  	} 
	  	?>
	  </table>
	  </center>

	
</div>

</body>
</html>