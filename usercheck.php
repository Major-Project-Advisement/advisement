<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["userId"]))
 {
   $uid = (int)$_POST["userId"];

   $sql = "Select COUNT(employeeID) as count from advisor where employeeID = $uid";

  
   $result = mysqli_query($conn, $sql);
      
   $row = mysqli_fetch_assoc($result);
      
   echo $row['count'];
   

 }



?>