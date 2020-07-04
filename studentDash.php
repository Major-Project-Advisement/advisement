<?php 
    Session_start();//continue/start session
    include_once 'includes/config.php';

    if(isset($_SESSION['StudentID'])){
      
      foreach($_SESSION as $key => $value) //create local variables based on $_SESSION keys and values
      {
        $$key = $value;
      
      }
      
      if($Image == 'null')
      {
        $Image = 'images/placeholder.jpg';
      }
      else
      {
        $Image = 'uploads/'.$Image;
      }

      if($IsActive == 1)
      {
        $status = 'Active';
      }
      else
      {
        $status = 'Inactive';
      }

      include_once "includes/config.php";

      $sql = "SELECT COUNT(*) as count FROM passedmodules WHERE StudentID=$UID";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $completed=$row["count"];
      $level = floor($completed/10) +1;
      $remaining = 44-$completed;


    }
    $username = $FirstName;
    $page_title="Profile";
    $header="Dashboard";
    $style='';
    $date = date('Y/m/d');

    //Create a SQL statement to get the Advisors name using $AdvisorID and set it to a variable to use for the modal
    $sql = "SELECT * FROM `advisor` WHERE `AdvisorID` = '".$AdvisorID."' LIMIT 1 ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $AdvisorFirstName = $row['FirstName'];
    $AdvisorLastName = $row['LastName'];
    $AdvisorImage = $row['Image'];
    if($AdvisorImage == 'null'){
      $AdvisorImage = 'images/placeholder.jpg';
    }else{
      $AdvisorImage = 'uploads/'.$AdvisorImage;
    }
    $AdvisorPhone = $row['Phone'];
    $AdvisorEmail = $row['Email'];
    $AdvisorTitle = $row['Title'];
    $AdvisorSchool = $row['SchoolID'];

    if($AdvisorSchool == 1){
      $AdvisorSchool = "School of Computing and Information Technology";
    }else{
      $AdvisorSchool = "School of Engineering";
    }

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
        
      </ol>
    </nav>
    </div>';

    $sidebar = '<!-- sidebar -->
          
    <!-- profile -->

    <div class="col-md-3">

      <div class="card" style="text-align: center">
              <!-- SIDEBAR USERPIC -->
      <div class="card-body">
              <div class="profile-userpic">
                  <img src="'.$Image.'" class="img-responsive" alt="profile picture">
              </div>
              <!-- END SIDEBAR USERPIC -->
              <!-- SIDEBAR USER TITLE -->
              <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    '.$Title.' '.$FirstName.' '.$LastName.'
                </div>
                <div class="profile-usertitle-job">
                    '.$status.'
                </div>
              </div>
              </div>
              <!-- END SIDEBAR USER TITLE -->
              </div>
      <br/>
      <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active main-color-bg">
        <span class="material-icons">school</span> Progress</a>
      <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
        Completed <span class="badge badge-dark">'.$completed.'</span></a>
      <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
        Level  <span class="badge badge-dark">'.$level.'</span> </a>
      <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
        Remaining  <span class="badge badge-dark ">'.$remaining.'</span></a>
      </div>
      
      <br>
    </div>';



    $main = '
    <!-- main document -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header main-color-bg">
         <span class="material-icons">account_box</span> Overview
        </div>
        <div class="card-body row">
          <div class="col-4" style="text-align: center;">
            <div class="well dash-box">
              <h2><span class="material-icons">inbox</span> 5</h2>
              <h4>Inbox</h4>
            </div>
  
           <div class="card-body row">
              <div class="col-4" style="text-align: center;">
  
                <div class="well dash-box">
                  <h2><span class="material-icons">forum</span> 5</h2>
                  <h4>Meetings</h4>
  
                </div>
  
              </div>
  
              <div class="col-4" style="text-align: center;">
  
                <div class="well dash-box">
                  <h2><span class="material-icons">inbox</span> 5</h2>
                  <h4>Inbox</h4>
  
                </div>
  
              </div>
  
              <div class="col-4" style="text-align: center;">
  
                <div class="well dash-box">
                  <h2><span class="material-icons">next_week</span> 5</h2>
                  <h4>Sent Items</h4>
  
                </div>
  
              </div>
  
            </div>
          </div>
          <div class="col-4" style="text-align: center;">
            <div class="well dash-box">
              <h2><span class="material-icons">inbox</span> 5</h2>
              <h4>Inbox</h4>
            </div>
          </div>
        </div>
      </div>
          <br>

          <div class="card" >
            <div class="card-header main-color-bg">
              Current Modules
            </div>
  
              <table class="table table-striped table hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Module Code</th>
                    <th>Type</th>
                    <th>Credits</th>
                  </tr>
                </thead>
  
                <tbody  id="currentmodules" data="'.$UID.'" >
                  
                </tbody>
              </table>
  
  
              
            </div>
  
  
          </div>




          <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="studentMessage.php" method="post" id="register_form" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>From: <b>Me</b></label>
                      <br>
                      <label>To: <b>'.$AdvisorFirstName.' '.$AdvisorLastName.'</b> </label>
                    </div>  
                    <div class="form-group">
                      <label>Subject</label>
                      <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <label>Message</label>
                      <input type="text" name="message" class="form-control" placeholder="Message">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="RequestMeeting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="studentMeeting.php" method="post" id="register_form" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request A Meeting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Time: <br><input type="time" id="MeetingTime" name="MeetingTime"
                      min="09:00" max="18:00" required> </label>
                      <br>
                      <label>Date: <br><input type="date" id="MeetingDate" name="MeetingDate"
                      value="'.$date.'"
                      min="'.$date.'" ></label>
                    </div>  
                    <div class="form-group">
                      <label>Topic:<br></label>
                      <select id="topic" name="topic" class="form-control">
                        <option value="Grades">Issue With Grades</option>
                        <option value="Course">Course Selection</option>
                        <option value="Personal">Personal Challlenges</option>
                        <option value="Financial">Financial Challenges</option>
                        <option value="Explanation">Explanation of Rules and Procedures</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Description:<br></label>
                      <input type="text" name="description" class="form-control" placeholder="Description">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Request Meeting</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="ViewAdvisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="viewAdvisor.php" method="post" id="register_form" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Advisor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="profile-userpic text-center">
                      <img src="'.$AdvisorImage.'" class="img-responsive" alt="profile picture">
                    </div>
                    <div class="text-center">
                      '.$AdvisorTitle.' '.$AdvisorFirstName.' '.$AdvisorLastName.'
                    </div>
                    <div class="text-center">
                      '.$AdvisorEmail.'
                    </div>
                    <div class="text-center">
                      '.$AdvisorPhone.'
                    </div>
                    <div class="text-center">
                      '.$AdvisorSchool.'
                    </div>
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
        ';
    include 'studentTemplate.php';

?>

<script>
  $(document).ready(function(){
    
        $.ajax({

    url: "getCurrentModules.php",
    method: "POST",
    data:{uid : $("#currentmodules").attr('data')},
    dataType: "text",
    async: false,
    success: function (html){
        
        if (html != ""){

            $("#currentmodules").html(html);
            
        } 
        else 
        {
            //display error
            $("#currentmodules").html("Not currently enrolled in any module");
          
        }
    }

    });
  });
</script>