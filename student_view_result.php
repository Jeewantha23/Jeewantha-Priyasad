<?php

error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {

	header("location:student_view_result.php");
}
elseif($_SESSION['usertype']=='student')
{
    header("location:student_view_result.php");
}


$hostname="localhost";

$user="root";

$password="";

$db="schoolproject1";

$data=mysqli_connect($hostname,$user,$password,$db);

if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];


    $sql = "SELECT courses.course_name, results.grade FROM result
            JOIN course ON results.course_id = courses.course_id
            WHERE results.student_id = '$student_id'";

    $result = $data->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Results for Student ID: $student_id</h2>";
        echo "<table border='1'><tr><th>Course Name</th><th>Grade</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["course_name"]. "</td><td>" . $row["grade"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student  Dashboard</title>
	
	<?php
   include 'admin_css.php';


   ?>
</head>
<body>
<?php
    include 'admin_sidebar.php';

?>
<center>
  <h2>View Your Results</h2>
    <form method="post">
        Student ID: <input type="text" name="student_id" required><br>
        <button type="submit">View Results</button>
    </form>
    </center>

</body>
</html>
