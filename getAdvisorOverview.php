<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["UID"]))
 {
   $uid = (int)$_POST["UID"];
   

    
    $sql1 = "SELECT count(*) as Modules FROM currentmodules WHERE StudentID=$uid";
    $sql2 = "SELECT count(*) as Meetings FROM meeting WHERE StudentID=$uid";
    $sql3 = "SELECT count(*) as Inbox FROM message WHERE StudentRecipient=$uid";
    $sql4 = "SELECT count(*) as Sent FROM message WHERE StudentSender=$uid";
    

   
  
   $result = mysqli_query($conn, $sql1);
   $modules = mysqli_fetch_assoc($result);

   $result = mysqli_query($conn, $sql2);
   $meetings = mysqli_fetch_assoc($result);

   $result = mysqli_query($conn, $sql3);
   $inbox = mysqli_fetch_assoc($result);

   $result = mysqli_query($conn, $sql4);
   $sent = mysqli_fetch_assoc($result);

   $html = '

            <div class="col-md-4 col-6" style="text-align: center;">
                <a id="meetings" class="overview-section" data="meetings" style="cursor: pointer;">
                    <div class="well dash-box">
                        <h2><span class="material-icons">forum</span>'.$meetings["Meetings"].'</h2>
                        <h4>Meeting</h4>

                    </div>
                </a>
            </div>
               

            <div class="col-md-4 col-6" style="text-align: center;">
                <a id="inbox" class="overview-section" data="inbox" style="cursor: pointer;">
                    <div class="well dash-box">
                        <h2><span class="material-icons">inbox</span>'.$inbox["Inbox"].'</h2>
                        <h4>Inbox</h4>

                    </div>
                </a>
            </div>

            <div class="col-md-4 col-6" style="text-align: center;">
                <a id="sent" class="overview-section" data="sentItems" style="cursor: pointer;">
                    <div class="well dash-box">
                        <h2><span class="material-icons">next_week</span>'.$sent["Sent"].'</h2>
                        <h4>Sent Items</h4>

                    </div>
                </a>
            </div>';



   

   echo $html;
      
 }
?>