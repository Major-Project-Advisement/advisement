<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["programId"]))
 {
   $pid = (int)$_POST["programId"];

   $sql = "SELECT * FROM program WHERE ProgramID = $pid";

  
   $result = mysqli_query($conn, $sql);
   $name = "";
      
   $row = mysqli_fetch_assoc($result);
   $name = $row["Name"];



   echo $name;
      
 }
?>