<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["UID"]))
 {
   $uid = (int)$_POST["UID"];
   $mid = (int)$_POST["MID"];
   $action = (int)$_POST["action"];
  
   if($action == 0){

    $sql = "INSERT INTO currentmodules (StudentID, ModuleID) VALUES ($uid, $mid);";
    mysqli_query($conn, $sql);
   
    
   }else 
   if($action == 1){

    $sql = "DELETE FROM currentmodules WHERE ModuleID = $mid;";
    mysqli_query($conn, $sql);

   }
      
 }
?>