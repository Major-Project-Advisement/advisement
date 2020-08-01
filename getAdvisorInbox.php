<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   $uid = (int)$_POST["uid"];

   $sql = "SELECT * FROM message WHERE AdvisorRecipient = $uid";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

    $sql1 = 'SELECT Title, LastName FROM student WHERE UID = '.$row["StudentSender"];

  
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

        $html = $html.'<tr data-student="'.$row["StudentSender"].'" data-message="'.$row["MessageID"].'" data-subject="'.$row["Subject"].'" data-content="'.$row["Content"].'">
        <td>'.$row1["Title"].' '.$row1["LastName"].'</td>
        <td>'.$row["Subject"].'</td>
        <td>'.$row["SentOn"].'</td>';

        if($row["Status"]== 0){

            $html = $html.'<td class="text-primary">Unread</td> 
                        <td><a class="btn btn-info read-message" href="#ReadMessage" data-toggle="modal" data-target="#ReadMessage"> Read </a></td>';
        }else{
            $html = $html.'<td class="text-secondary">Read</td> 
                        
                        <td><a class="btn btn-info read-message mr-2" href="#ReadMessage" data-toggle="modal" data-target="#ReadMessage"> Read </a> <a class="btn btn-danger delete-message"> Delete</a></td>';
        }    
        $html = $html.'</tr>';

   }
   

   echo $html;
      
 }
?>