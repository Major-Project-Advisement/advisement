<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   $uid = (int)$_POST["uid"];

   $sql = "SELECT * FROM message WHERE AdvisorSender = $uid";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

    $sql1 = 'SELECT Title, LastName FROM student WHERE UID = '.$row["StudentRecipient"];

  
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

        $html = $html.'<tr data-student="'.$row["StudentRecipient"].'" data-message="'.$row["MessageID"].'">
        <td >'.$row1["Title"].' '.$row1["LastName"].'</td>
        <td>'.$row["Subject"].'</td>
        <td>'.$row["SentOn"].'</td>
        <td><a class="btn btn-warning delete-message"> Delete </a></td>
      </tr>';

   }
   

   echo $html;
      
 }
?>