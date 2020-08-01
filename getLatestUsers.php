<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   

   $sql = 'Select * from 
   (Select Title, FirstName, LastName, "Student" as Type, CreatedOn as Joined from student 
   UNION 
   Select Title, FirstName, LastName, "Advisor" as Type, CreatedOn as Joined from advisor)a 
   ORDER BY a.Joined DESC LIMIT 15';

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

        $html = $html.'<tr>
        <td>'.$row["Title"].'</td>
        <td>'.$row["FirstName"].'</td>
        <td>'.$row["LastName"].'</td>
        <td>'.$row["Type"].'</td>
        <td>'.$row["Joined"].'</td>
      </tr>';

   }
   

   echo $html;
      
 }
?>