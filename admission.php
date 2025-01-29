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

$sql="SELECT * from admission";

$result=mysqli_query($data,$sql);

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<style>
.change{
	padding: 20px;
	font-size: 15px;
}

		
.content {
	text-align: center;
}
table  {

 font-family: arial, sans-serif;
border: 1px solid blue;
 height: 80%;
  width: 45%;

}
td, th  {
   border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
   <?php
   include 'admin_css.php';


   ?>
	
</head>
<body>

	<?php
    include 'admin_sidebar.php';



	?><br>

  
<div class="content">

	<h1>Applied For Admission</h1><br><br>
<center>
	<table>
  <tr>
     <th>Registration ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Gender</th>
    <th>Phone Number</th>
    

     </tr>

       <?php

           while ($info=$result->fetch_assoc()) {
           	
           
       ?>
      

  <tr>

    <td>
    <?php
    echo "{$info['id']}";

    ?>
    </td>

    <td>
    <?php
    echo "{$info['name']}";

    ?>
    </td>

    <td>
    	 <?php
    echo "{$info['email']}";


    ?>
    </td>
    <td>
    	<?php
    echo "{$info['course']}";


    ?>
    </td>
    <td>
    	<?php
    echo "{$info['gender']}";


    ?>
    </td>
    <td>
    <?php
    echo "{$info['Phone_Number']}";

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