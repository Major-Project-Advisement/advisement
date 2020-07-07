<?php 
Session_start();

foreach($_SESSION as $key => $value) //create local variables based on $_SESSION keys and values
      {
        $$key = $value;
      
      }
include_once "includes/config.php";


$sql = 'SELECT * FROM student WHERE UID = '.$UID; //sql statement with ? placeholder 

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


    
    

    foreach($row as $key => $value){							
        $_SESSION[$key] = $value; //SESSION
    }

    header("Location: studentDash.php");
?>