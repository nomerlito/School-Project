<?php
$nocode = $_GET['no'];
$id = $_GET['id'];
$image = $id.".jpg";
echo $nocode;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1pmj";

$newURL = "index.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}        
            $sql = "DELETE FROM profile WHERE no=$nocode";

            if ($conn->query($sql) === TRUE) {
                if(file_exists('images/avatar/'.$image)) {
                    unlink('images/avatar/'.$image);
                    header('Location: '.$newURL);
                    //echo "Record deleted successfully";
                }else{
                    echo "Error deleting record: " . $conn->error;
                    header('Location: '.$newURL);
                }
              } else {
                echo "Error deleting record: " . $conn->error;
              }
?>