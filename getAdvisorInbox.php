<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["AdvisorID"])){
    $uid = (int)$_POST["AdvisorID"];

    //$sql = "SELECT * FROM message WHERE AdvisorSender = $uid AND AdvisorRecipient = $uid";
    $sql = "SELECT * FROM message WHERE AdvisorRecipient = $uid";

    $result = mysqli_query($conn, $sql);
    $html = "";      
    $row1 = mysqli_fetch_assoc($result);


    $html = $html.'<tr>
    <td>'.$row1["Title"].' '.$row1["LastName"].'</td>
    <td>'.$row1["Subject"].'</td>
    <td>'.$row1["Date"].'</td>';
    if($Status == 0){
        $html = $html.'<td class="text-primary">Unread</td> 
                    <td><a class="btn btn-info read-message"> Read </a></td>';
    }else{
        $html = $html.'<td class="text-secondary">Unread</td> 
                    <td><a class="btn btn-danger delete-message"> Delete</a>/td>';
    }    
    $html = $html.'</tr>';

   

   echo $html;
      
 }
?>