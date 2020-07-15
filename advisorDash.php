<?php 
  include_once 'includes/config.php';
  Session_start();//continue/start session
  
  if(isset($_SESSION['EmployeeID'])){
    
    foreach($_SESSION as $key => $value) //create local variables based on $_SESSION keys and values
    {
      $$key = $value;
    
    }
    
    if($Image == 'null')
    {
      $image = 'images/placeholder.jpg';
    }
    else
    {
      $image = 'uploads/'.$Image;
    }

    if($IsActive == 1){
      $status = 'Active';
    }
    else
    {
      $status = 'Inactive';
    }

  }

  $numStudents = 0;
  $numMeetings = 0;
  $numInbox = 0;

  //SQL to get the number of Students assigned to this Advisor
  $sql = "SELECT * FROM student where AdvisorID='".$AdvisorID."'";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)){
    $numStudents = $numStudents + 1;
  }

  //SQL to get the number of Messages assigned to this Advisor
  $sql = "SELECT * FROM message WHERE AdvisorSender='".$AdvisorID."' OR AdvisorRecipient='".$AdvisorID."' ";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $numInbox = $numInbox + 1;
  }

  //SQL to get the number of Meetings assigned to this Advisor
  $sql = "SELECT * FROM meeting WHERE AdvisorID='".$AdvisorID."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $numMeetings = $numMeetings + 1;
  }


  $username = $FirstName;
  $page_title="Profile";
  $header="Dashboard";
  $style='';

  $crumb='<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Dashboard</li>
      
    </ol>
  </nav>
  </div>';

  $sidebar = '<!-- sidebar -->
        
  <!-- profile -->

  <div class="col-md-4">

    <div class="card" style="text-align: center">
            <!-- SIDEBAR USERPIC -->
    <div class="card-body">
            <div class="profile-userpic">
                <img src="'.$image.'" class="img-responsive" alt="profile picture">
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
      <span class="material-icons">school</span>  Activity</a>
    <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
      Completed <span class="badge badge-dark">40</span></a>
    <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
      Level  <span class="badge badge-dark">4</span> </a>
    <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
      Remaining  <span class="badge badge-dark ">7</span></a>
    </div>
    
    <br>
  </div>';



  $main = '  
      <!-- main document -->
      <div class="col-md-8">

      <div class="card">
        <div class="card-header main-color-bg">
          <span class="material-icons">account_box</span> Overview
        </div>

        <div class="card-body row">
          <div class="col-4" style="text-align: center;">

            <div class="well dash-box">
              <h2><span class="material-icons">inbox</span> '.$numInbox.'</h2>
              <h4>Inbox</h4>

            </div>

          </div>

          <div class="col-4" style="text-align: center;">

            <div class="well dash-box">
              <h2><span class="material-icons">work</span> '.$numMeetings.'</h2>
              <h4>Meetings</h4>

            </div>

          </div>

          <div class="col-4" style="text-align: center;">

            <div class="well dash-box">
              <h2><span class="material-icons">people_alt</span> '.$numStudents.'</h2>
              <h4>Students</h4>

            </div>

          </div>

        </div>

      </div>

      <br>
      <div class="card" >
          <div class="card-header main-color-bg">
          <span class="material-icons">contacts</span> Students
          </div>

          <table class="table table-striped table hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Status</th>
                <th>Email</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>


          
        </div>


      </div>
        
  ';
    
  include 'advisorTemplate.php';

?>


<script>
  $(document).ready(function(){
   





    //ajax call for populating Meetings Table
    $.ajax({
    url: "getAdvisorMeetings.php",
    method: "POST",
    data:{uid : $("#currentmodules").attr('data')},
    dataType: "text",
    async: false,
    success: function (html){
        
        if (html.length != 3 ){
            $("#currentMeetings").html(html);
        } else {
            //display error
            $("#currentMeetingsError").html('<p>You have no meetings at this time</p>');
        }
    }

    });



    //ajax call for populating Inbox
    $.ajax({

    url: "getAdvisorInbox.php",
    method: "POST",
    data:{uid : $("#currentmodules").attr('data')},
    dataType: "text",
    async: false,
    success: function (html){
        
      if (html.length != 3 ){
        $("#currentInbox").html(html);
      }else{
        //display error
        $("#currentInboxError").html('<p>You have no new messages</p>');
      }
    }

    });




    $(".overview-section").click(function(){
      $(".overview-section").children("div").removeClass("text-primary")
        $(this).children("div").addClass("text-primary")
        $(".overview-card").hide();
        id="#"+$(this).attr("data")
        $("div"+id).show();

    });








  })



</script>