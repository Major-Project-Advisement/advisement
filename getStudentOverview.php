<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["UID"]))
 {
   $uid = (int)$_POST["UID"];
   

    
   
    $sql = "SELECT a.StudentID, a.Meetings, b.Inbox, c.Sent FROM 
            (SELECT StudentID, count(*) as Meetings FROM meeting WHERE StudentID=$uid) a, 
            (SELECT Recipient as StudentID, count(*) as Inbox FROM message where Recipient=$uid) b, 
            (SELECT Sender as StudentID, count(*) as Sent FROM message where Sender=$uid) c 
            WHERE a.StudentID = b.StudentID and b.StudentID = c.StudentID";
    

   
  
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);

   $html = '
            <div class="col-4" style="text-align: center;">
            <a id="meetings" style="cursor: pointer;">
                <div class="well dash-box">
                    <h2><span class="material-icons">forum</span>'.$row["Meetings"].'</h2>
                    <h4>Meeting</h4>

                </div>
            </a>
            </div>
               

            <div class="col-4" style="text-align: center;">
            <a id="inbox" style="cursor: pointer;">
                <div class="well dash-box">
                    <h2><span class="material-icons">inbox</span>'.$row["Inbox"].'</h2>
                    <h4>Inbox</h4>

                </div>
            </a>
            </div>

            <div class="col-4" style="text-align: center;">
            <a id="sent" style="cursor: pointer;">
                <div class="well dash-box">
                    <h2><span class="material-icons">next_week</span>'.$row["Sent"].'</h2>
                    <h4>Sent Items</h4>

                </div>
            </a>
            </div>';



   

   echo $html;
      
 }
?>