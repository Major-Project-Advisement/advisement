<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   $uid = (int)$_POST["uid"];

   $sql = "SELECT * FROM meeting WHERE StudentID = $uid";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

        $html = $html.'<tr>
        <td>'.$row["Topic"].'</td>
        <td>'.$row["Date"].'</td>
        <td>'.$row["Description"].'</td>
        <td>'.$row["Status"].'</td>
      </tr>';

   }
   

   echo $html;
      
 }
?>