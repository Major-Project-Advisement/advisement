<?php 
 session_start();
 include_once "includes/config.php";

 if(isset($_POST["UID"]))
 {
   
   $uid = (int)$_POST["UID"];
   

    
    $sql = "DELETE FROM student WHERE UID = $uid";

   
  
   mysqli_query($conn, $sql);
   session_destroy();
   
 }
 

 ?>