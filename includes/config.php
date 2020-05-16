 <?php 

$dbservername="localhost";
$dbUsername ="root";
$dbpassword = "mysql";
$dbName = "Advisement";

$conn = mysqli_connect($dbservername, $dbUsername, $dbpassword, $dbName) OR DIE ("Unable to connect to Database.");

?>  