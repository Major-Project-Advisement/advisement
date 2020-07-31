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

  <div class="col-md-3">

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
  <div class="col-md-9">
    <div class="card mb-3" >
      <div class="card-header main-color-bg">
       <span class="material-icons">account_box</span> Overview
      </div>
      <div class="card-body row">
     
         <div id="overview" data="'.$AdvisorID.'"  class="card-body row">
           

        </div>
        
      </div>
    </div>

    <div id="currentModules" class="card overview-card mb-3"  >
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

        <tbody  id="currentmodules" data="'.$AdvisorID.'" >
          
        </tbody>
      </table>
      <div id="currentmoduleserror" class="col-12" style="text-align: center">
      
      </div>        
    </div>

    <div id="meetings" class="card overview-card mb-3" style="display: none;" >
      <div class="card-header main-color-bg">
        Meetings
      </div>

      <table class="table table-striped table hover">
        <thead>
          <tr>
            <th>Topic</th>
            <th>Date</th>
            <th>Time</th>
            <th>Description</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody  id="currentMeetings" data="'.$AdvisorID.'" >
          
        </tbody>
      </table>
      <div id="currentMeetingsError" class="col-12" style="text-align: center">
    
    </div>

  </div>

      <div id="inbox" class="card overview-card mb-3" style="display: none;">
        <div class="card-header main-color-bg">
          Inbox
        </div>

        <table class="table table-striped table hover">
          <thead>
            <tr>
              <th>Sender</th>
              <th>Subject</th>
              <th>Date </th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody id="currentInbox" data="'.$AdvisorID.'" >
            
          </tbody>
        </table>
        <div id="currentInboxError" class="col-12" style="text-align: center">
        
        </div>
      </div>

        
      <div id="sentItems" class="card overview-card mb-3" style="display: none;" >
        <div class="card-header main-color-bg">
          Sent Items
        </div>

        <table class="table table-striped table hover">
          <thead>
            <tr>
              <th>Recipient</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody  id="currentSent" data="'.$AdvisorID.'" >
            
          </tbody>
        </table>
        <div id="currentSentError" class="col-12" style="text-align: center">
        
        </div>
      </div>
    </div>
  </div>
';
    
  include 'advisorTemplate.php';

?>


<script>
  $(document).ready(function(){

    //ajax call for populating The Overview
    $.ajax({

            url: "getAdvisorOverview.php",
            method: "POST",
            data:{UID : $("#overview").attr('data')},
            dataType: "text",
            async: false,
            success: function (html){
                  
              $("#overview").html(html);
                                                                        
            }

    });

    //ajax call for populating Meetings Table
    $.ajax({

      url: "getStudentMeetings.php",
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

      //ajax call for populating Sent Items Table
    $.ajax({

      url: "getStudentSent.php",
      method: "POST",
      data:{uid : $("#currentmodules").attr('data')},
      dataType: "text",
      async: false,
      success: function (html){
          
          if (html.length != 3 ){

              
            
              $("#currentSent").html(html);
              
          } 
          else 
          {
              
              //display error
              $("#currentSentError").html('<p>You have no sent items</p>');
            
          }
      }

      });

        //ajax call for populating Sent Items Table
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


  });
</script>