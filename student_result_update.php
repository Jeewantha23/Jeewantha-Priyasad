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

$st1=$_GET['stuid'];

$sql="SELECT * FROM result1 WHERE StudentID='$st1' ";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();



if (isset($_POST['update_result'])) {
	
	$student=$_POST['stuid'];
	$stucor=$_POST['corid'];
	$cor_gra=$_POST['corgrade'];

	$query="UPDATE result1 SET StudentID='$student',CourseID='$stucor',Grade='$cor_gra' WHERE StudentID='$st1' ";

	$result2=mysqli_query($data,$query);

	if ($result2) {
	header ("location:admin_view_result.php");
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
	<h1>Student Update Result</h1><br><br>
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

        			<label>Grade</label>
        			<input type="text" name="corgrade" value="<?php echo "{$info['Grade']}"; ?>">
        		</div><br>


        		<div>

        			<input type="submit" class="btn btn-primary" name="update_result" value="Update  Result">
        		</div>

        			
        		


        	</form>
	        


         
      </center>
  </div>
	
</div>

</body>
</html>