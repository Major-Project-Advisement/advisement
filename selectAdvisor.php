<?php 
 Session_start();
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   $aid = (int)$_POST["aid"];
   $uid = (int)$_POST["uid"];
   
   $sql = "UPDATE student SET AdvisorID = $aid WHERE UID=uid";

   mysqli_query($conn, $sql);

  
}