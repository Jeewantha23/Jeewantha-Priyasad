<?php

error_reporting(0);
session_start();


$hostname="localhost";

$user="root";

$password="";

$db="schoolproject1";

$data=mysqli_connect($hostname,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        	$name = $_POST['username'];
        	$pass = $_POST['password'];

        	$sql="SELECT * FROM user where username='".$name."' AND password='".$pass."' ";
            
            $result=mysqli_query($data,$sql);

            $row=mysqli_fetch_array($result);

             if ($row["usertype"]=="student")
              {

                
                 $_SESSION['username']=$name;

                 $_SESSION['usertype']="student";

             	header("location:studenthome.php");
             }


             elseif ($row["usertype"]=="admin")
              {  

                $_SESSION['username']=$name;

                 $_SESSION['usertype']="admin";

                     	
              	header("location:adminhome.php");
             }
             else
             {

              session_start();
             $message="username or password do not match";

             $_SESSION['loginMessage']=$message;

             header("location:login.php");
             }

        }

?>