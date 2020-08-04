<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["MeetingID"]))
 {
   $mid = (int)$_POST["MeetingID"];

   $sql = "INSERT INTO events ( AdvisorID, StudentID, Title, Start) 
   SELECT AdvisorID, StudentID, 'Student Advisor meeting', CONCAT(Date, ' ', Time) 
   FROM meeting WHERE MeetingID = $mid";
   
      

   $result = mysqli_query($conn, $sql);
 
 }
?>