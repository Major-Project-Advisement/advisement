<?php 
 session_start();
 include_once "includes/config.php";

 if(isset($_POST["messageID"]))
 {
   
   $id = (int)$_POST["messageID"];
   

    
    $sql = "UPDATE message SET Status = 1 WHERE MessageID = $id";

   
  
   mysqli_query($conn, $sql);
   
   
 }
 

 ?>