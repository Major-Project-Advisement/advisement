<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["UID"]))
 {
   $uid = (int)$_POST["UID"];
   

    
    $sql1 = "SELECT count(*) as Students FROM student WHERE IsActive=1";
    $sql2 = "SELECT count(*) as Advisors FROM advisor WHERE IsActive=1";
    $sql3 = "SELECT count(*) as Inbox FROM message WHERE StudentRecipient=$uid AND Status = 0";
    $sql4 = "SELECT count(*) as Sent FROM message WHERE StudentSender=$uid";
    

   
  
   $result = mysqli_query($conn, $sql1);
   $students = mysqli_fetch_assoc($result);

   $result = mysqli_query($conn, $sql2);
   $advisors = mysqli_fetch_assoc($result);

   $result = mysqli_query($conn, $sql3);
   $inbox = mysqli_fetch_assoc($result);

   
   $html = '
            <div class="col-md-4 col-4" style="text-align: center;">
                <a id="studnets" class="overview-section" data="currentStudents" style="cursor: pointer;">
                    <div class="well dash-box">
                        <h2><span class="material-icons">account_circle</span>'.$students["Students"].'</h2>
                        <h4>Total Students</h4>

                    </div>
                </a>
            </div>

            <div class="col-md-4 col-4" style="text-align: center;">
                <a id="advisors" class="overview-section" data="meetings" style="cursor: pointer;">
                    <div class="well dash-box">
                    
                        <h2><span class="material-icons">supervisor_account</span>'.$advisors["Advisors"].'</h2>
                        <h4>Total Advisors</h4>

                    </div>
                </a>
            </div>
               
            <div class="col-md-4 col-4" style="text-align: center;">
                <a id="inbox" class="overview-section" data="inbox" style="cursor: pointer;">
                    <div class="well dash-box">
                        <h2><span class="material-icons">inbox</span>'.$inbox["Inbox"].'</h2>
                        <h4>Inbox</h4>

                    </div>
                </a>
            </div>';



   

   echo $html;
      
 }
?>