 <?php 

$dbservername="localhost";
$dbUsername ="root";
$dbpassword = "Password1";
$dbName = "advisement";

$conn = mysqli_connect($dbservername, $dbUsername, $dbpassword, $dbName) OR DIE ("Unable to connect to Database.");

?>  