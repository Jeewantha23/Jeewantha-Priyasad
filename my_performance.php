
<?php

error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {

	header("my_performance.php");
}
elseif($_SESSION['usertype']=='student')
{
    header("my_performance.php");
}


$hostname="localhost";

$user="root";


$password="";

$db="schoolproject1";

$data=mysqli_connect($hostname,$user,$password,$db);


$sql="SELECT * FROM course1, result1, user";
$result=mysqli_query($data,$sql);




?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js">
<style >
	
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 55%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>

<header class="header">
	<a href="">Admin Dashboard</a>

	<div class="logout">
		<a href="logout.php" class="btn btn-primary">Logout</a>
	</div>
</header>
<aside>
	<ul>
		<li>
			<a href="studenthome.php">Back Home</a>
		</li>
		
	
</ul>
</aside>
<br>
	
		
	<body>


		<center>
			<h2>My Acedemic Performance</h2><br><br>
			 
			<table>
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Course ID</th>
					<th>Course Name</th>
					<th>Grade</th>
				</tr>


  <?php
while ($info=$result->fetch_assoc()) 
{


  ?>

				

				<tr>
					<td>
						<?php
         echo "{$info['StudentID']}";
           ?>
					</td>

					<td>
						<?php
         echo "{$info['username']}";
              ?>
					</td>

					<td>
						<?php
         echo "{$info['CourseID']}";
            ?>
					</td>

					<td>
						<?php
         echo "{$info['CourseName']}";
           ?>
					</td>

					<td>
						<?php
         echo "{$info['Grade']}";
            ?>
					</td>

				</tr>
				<?php
}
  ?>
				
			</table>
			
		</center>
		





	</body>	
	</html>
	
