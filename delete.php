<?php

session_start();


$hostname="localhost";

$user="root";

$password="";

$db="schoolproject1";

$data=mysqli_connect($hostname,$user,$password,$db);

if ($_GET['student_id']) {

$user_id=$_GET['student_id'];

$sql="DELETE FROM user WHERE id='$user_id' ";

$result=mysqli_query($data,$sql);

if ($result) {

	$_SESSION['message']='Delete Student Is Successful';
	header("location:view_student.php");
}
}


?>