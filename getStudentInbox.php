<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["uid"]))
 {
   $uid = (int)$_POST["uid"];

   $sql = "SELECT * FROM message WHERE StudentRecipient = $uid";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

    $sql1 = 'SELECT Title, LastName FROM advisor WHERE AdvisorID = '.$row["AdvisorSender"];

  
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

        $html = $html.'<tr data-advisor="'.$row["AdvisorSender"].'" data-message="'.$row["MessageID"].'">
        <td>'.$row1["Title"].' '.$row1["LastName"].'</td>
        <td>'.$row["Subject"].'</td>
        <td>'.$row["SentOn"].'</td>';

        if($Status == 0){
            $html = $html.'<td class="text-primary">unread</td> 
                        <td><a class="btn btn-info read-message"> Read </a></td>';
        }else{
            $html = $html.'<td class="text-secondary">unread</td> 
                        <td><a class="btn btn-danger delete-message"> Delete</a>/td>';
        }    
        $html = $html.'</tr>';

   }
   

   echo $html;
      
 }
?>