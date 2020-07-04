<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   $uid = (int)$_POST["uid"];

   $sql = "SELECT * FROM module WHERE ModuleID IN(SELECT ModuleID FROM currentmodules WHERE StudentID = $uid)";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

        $html = $html.'<tr>
        <td>'.$row["Name"].'</td>
        <td>'.$row["ModuleCode"].'</td>
        <td>'.$row["Type"].'</td>
        <td>'.$row["Credits"].'</td>
      </tr>';

   }
   

   echo $html;
      
 }
?>