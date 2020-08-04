<?php 
 
 include_once "includes/config.php";
 //include 'advisorTemplate.php';

 if(isset($_POST["uid"]))
 {
   $uid = (int)$_POST["uid"];

   $sql = "SELECT * FROM meeting WHERE AdvisorID = $uid";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

        $html = $html.'<tr data-meeting="'.$row["MeetingID"].'" data-student="'.$row["StudentID"].'">
        <td>'.$row["Topic"].'</td>
        <td>'.$row["Date"].'</td>
        <td>'.$row["Time"].'</td>
        <td>'.$row["Description"].'</td>';

      if($row["Status"] == 'Pending'){

          $html = $html.'<td>'.$row["Status"].'</td> 
                      <td><a class="btn btn-info read-message" href="#Respond" data-toggle="modal" data-target="#Respond"> Respond </a></td>';

      }else if($row["Status"] == 'Accepted'){

        $html = $html.'<td>'.$row["Status"].'</td> 
          <td><a class="btn btn-danger remove-request"> Remove </a></td>';
      }else{
          $html = $html.'<td>'.$row["Status"].'</td> 
                      
          <td><a class="btn btn-danger remove-request"> Remove </a></td>';
      }  

      $html= $html.'</tr>';

   }
   

   echo $html;
      
 }

 
 












?>