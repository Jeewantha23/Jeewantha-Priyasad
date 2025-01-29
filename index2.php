<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
  $message=$_SESSION['message'];

  echo "<script tye='text/javascript'>
    alert('$message');

   </script>";
 }


$hostname="localhost";

$user="root";

$password="";

$db="schoolproject1";

$data=mysqli_connect($hostname,$user,$password,$db);

$sql="SELECT * FROM lecturer";

$result=mysqli_query($data,$sql);
  



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js">

</head>
<body>
    <nav>
    <label class="logo">SLIATE ATI-NAWALAPITIYA</label>
 
     <ul>
         <li><a href="index2.php">Home</a></li>
        <li><a href="contact_details.php">Contact Us</a></li>
           <li><a href="login.php" class="btn btn-success">Login</a></li>
    </ul>
   </nav>

   <div class="section1">
    <label class="img_text"> We Teach Student With Care</label>
    <img  class="main_img" src="logo3.jpg">
    </div>

    <div class="container">
      <div class="row">

   
        <div class="col-md-4">
          <img src="logo2.jpg" class="welcome_img ">
          </div>

        <div class="col-md-8">
          <h1>Welcome To Advanced Technology Institute Nawalapitya </h1>
          <p>SLIATE is recognized as Sri Lanka’s  and one of the non-state degree-awarding Institutes. Over the past two decades, SLIATE has been rooted in its commitment to supporting educational excellence, creating an environment for students to gain vital skills thus contributing towards shaping the national economy.<br><br>
            At SLIATE  we foster a culture of innovation, where ideas are nurtured and turned into impactful endeavors. Since its inception in 1997, SLIATE has empowered individuals with the passion, determination, and foresight to create positive change in society.
          </p>

            </div>
        
               </div>
                 </div><br>

            <center>
              <h1> Higher National Diploma Courses</h1><br>
            </center>   

  <div class="container">
  <div class="row">

  <div class="col-md-4">
  <img src="techno.jpeg"  class="courses">
  <h4>Higher National Diploma In Information Technology.</h4>
  </div>

  <div class="col-md-4">
  <img src="teach.jpeg" class="courses">
   <h4>Higher National Diploma In English.</h4>
                  
  </div>

  <div class="col-md-4">
  <img src="manage.jpeg" class="courses">
  <h4>Higher National Diploma In Management.</h4>
  </div>

  <div class="col-md-4">
    <br>
  <img src="tour.jpeg" class="courses">
  <h4>Higher National Diploma In Tourism And Hospitality Management.</h4>
  </div>

  <div class="col-md-4">
    <br>
  <img src="finance.jpeg" class="courses">
  <h4>Higher National Diploma In Business Finance.</h4>
  </div>


             <center>
              <h1> Our Lecturers</h1><br>
            </center> 

  <div class="container">
  <div class="row">

     <?php
    while($info=$result->fetch_assoc())
    {



     ?>

  <div class="col-md-4">
  <img src="<?php echo "{$info['image']}"  ?>"  class="courses">

<h4><?php echo "{$info['name']}"  ?></h4>

<h4><?php echo "{$info['description']}"  ?></h4>

  </div>

<?php
}


?>

  

  </div>
  </div>      
 <div class="admission_form">
    <form class="example" action="data_check.php" method="POST">
      <center>
        <h1>Admission Form.</h1>
      </center>

    <hr>
    <div class="container">
    <label ><b>Name:</b></label>
    <input type="text" placeholder="Enter FullName:" name="fullname" required>

    <label ><b>Email:</b></label>
    <input type="text" placeholder="Enter Email:" name="email" required>

    <label ><b>Phone Number:</b></label><br><br>
    <input type="number" placeholder="Enter phonenumber:" name="phonenumber" required><br><br>


     <label ><b>Choose a Course:</b></label><br>
    <select name="course" class="select-items" id="course">
     <option value="hndit">Higher National Diploma In Information Technology.</option>
     <option value="hnde">Higher National Diploma In English.</option>
     <option value="hndm">Higher National Diploma In Management.</option>
     <option value="hndt">Higher National Diploma In Tourism And Hospitality Management.</option>
     <option value="hndbf">Higher National Diploma In Business Finance.</option><br>
   </select><br><br>


     <p class="label_text"><b>Gender:</b></p>
    <input type="radio" name="male" value="male">
    <label >Male</label>
    <input type="radio" name="male" value="female">
    <label >Female</label>

<br><br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    

       <button type="submit" class="submit" name="apply">Apply</button>
    
  </div>
</form>
</form>
</body>
</html>