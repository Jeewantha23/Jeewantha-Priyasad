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


$sql="SELECT * FROM result1";

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

   </style>
</head>
<body>
<?php
    include 'admin_sidebar.php';



	?>

<br>
<div class="content">
	<center>
	<h1>Student View Result</h1><br><br>



	<?php
   if ($_SESSION['message']) {
   	echo $_SESSION['message'];
   }

   unset($_SESSION['message']);
	?>

<table style="width:70px">
		<tr>
		
			<th>StudentID</th>
			<th>CourseID</th>
			<th>Grade</th>
			<th>Delete</th>
			<th>Update</th>



				</tr>
		<?php
		while ($info=$result->fetch_assoc())
		 {
			
		

		?>

		<tr>
			<td>
			<?php echo "{$info['StudentID']}"; ?>	
			</td>

			<td>
				<?php echo "{$info['CourseID']}"; ?>
			</td>

			<td>
				<?php echo "{$info['Grade']}"; ?>
			</td>

			<td>
			<?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure to result Delete this');\" href='student_result_delete.php?stuid={$info['StudentID']}'>Delete</a>"; ?>	
			</td>


			<td>
				<?php echo "<a class='btn btn-primary' href='student_result_update.php?stuid={$info['StudentID']}'>Update </a>" ?>
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