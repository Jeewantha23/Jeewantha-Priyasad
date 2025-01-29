<?php

session_start();

$hostname="localhost";

$user="root";

$password="";

$db="schoolproject1";


$data=mysqli_connect($hostname,$user,$password,$db);

if($data==false)
{
	die("connection error");
}


if(isset($_POST['apply']))
{
	$data_name=$_POST['fullname'];
	$data_email=$_POST['email'];
	$data_cour=$_POST['course'];
	$data_male=$_POST['male'];
    $data_password=$_POST['psw'];
    $data_repeat_password=$_POST['psw-repeat'];
	$phone_num=$_POST['phonenumber'];



$sql="INSERT INTO admission(name,email,course,gender,password,again,Phone_Number) 
       VALUES ('$data_name','$data_email','$data_cour','$data_male','$data_password','$data_repeat_password','$phone_num')";


$result=mysqli_query($data,$sql);

if($result)
{
$_SESSION['message']= "your application sent successful";

header("location:index2.php") ;
}
else
{

echo "Apply failed";
}

}

?>