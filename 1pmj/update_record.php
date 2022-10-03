<?php 

/*require_once './config/db-config.php'; 
require_once './config/db-config.php';
require_once './controller/update-controller.php';
	$db = new DBController();
	$conn = $db->connect();*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1pmj";

$idcode = $_POST['no'];
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$status=$_POST['status'];
$newURL = "index.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "UPDATE profile SET sname='$sname', fname='$fname', mobile='$mobile', email='$email', status='$status' WHERE no=$idcode ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header('Location: '.$newURL);
} else {
  echo "Error updating record: " . $conn->error;
  
}

$conn->close();
?>
