<?php 
    Session_start();//continue/start session
    include_once 'includes/config.php';

    if(isset($_SESSION['EmployeeID'])){
      
      foreach($_SESSION as $key => $value) //create local variables based on $_SESSION keys and values
      {
        $$key = $value;
      
      }
      
      
     $Image = 'images/placeholder.jpg';
     
      
      include_once "includes/config.php";

      $sql = "SELECT COUNT(*) as count FROM passedmodules WHERE StudentID=16";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $users = $row["count"];
      $sent_messages = floor($users/10) +1;
      $meetings_accepted = 44-$users;


    }
    $username = $FirstName;
    $page_title="Management";
    $header="Dashboard";
    $style='';
    $status='';


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
                    Mr. '.$FirstName.' '.$LastName.'
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
          Total Users <span class="badge badge-dark">'.$users.'</span></a>
        <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
          Messages Sent <span class="badge badge-dark">'.$sent_messages.'</span> </a>
        <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
          Meetings Accepted  <span class="badge badge-dark ">'.$meetings_accepted.'</span></a>
        </div>
        
        <br>
      </div>
    ';



    $main = '
    <!-- main document -->
    <div class="col-md-9">
      <div class="card mb-3" >
        <div class="card-header main-color-bg">
         <span class="material-icons">account_box</span> Overview
        </div>
        <div class="card-body row">
       
           <div id="overview" data="'.$UID.'"  class="card-body row">
             
  
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

            <tbody  id="currentmodules" data="'.$UID.'" >
              
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

          <tbody  id="currentMeetings" data="'.$UID.'" >
            
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

            <tbody id="currentInbox" data="'.$UID.'" >
              
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

            <tbody  id="currentSent" data="'.$UID.'" >
              
            </tbody>
          </table>
          <div id="currentSentError" class="col-12" style="text-align: center">
          
          </div>    
        </div>
      </div>

    </div>
';
    include 'adminTemplate.php';

?>

<script>
  $(document).ready(function(){

    //ajax call for populating Current Modules Table
    $.ajax({

    url: "getCurrentModules.php",
    method: "POST",
    data:{uid : $("#currentmodules").attr('data')},
    dataType: "text",
    async: false,
    success: function (html){
        
        if (html.length != 3 ){

          
            $("#currentmodules").html(html);
            
        } 
        else 
        {
            
            //display error
            $("#currentmoduleserror").html('<p>Not currently enrolled in any module</p>');
          
        }
    }

    });

    //ajax call for populating The Overview
    $.ajax({

            url: "getStudentOverview.php",
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

        url: "getStudentInbox.php",
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

    $(".delete-message").click(function(){
      
      swal({
            title: "Are you sure?",
            text: "Are you sure you want to delete this message?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({

                url: "deleteMessage.php",
                method: "POST",
                data:{
                    messageID : $(this).parent().parent().attr('data-message')                   
                },
                dataType: "text",
                async: false,
                success: function (html){
                    window.location.replace("studentDash.php");
                    
                }

                });
            } else {
                swal("Cancelled message deletion");
            }
            });


    });

    $(".read-message").click(function(){
        console.log("read pressed");

        UpdateMessage($(this).parent().parent().attr('data-message'));

          $("#MessageContent").html($(this).parent().parent().attr("data-content"));
          $("#Subject").html($(this).parent().parent().attr("data-subject"));

        

        $("#CloseMessage").click(() => {
          
          window.location.replace("studentDash.php");

        });

       

      });

      function UpdateMessage(MessageID){
        $.ajax({

        url: "readMessage.php",
        method: "POST",
        data:{
            messageID : MessageID                  
        },
        dataType: "text",
        async: false,
        success: function (html){
          console.log(html);
            
        }

        });
      }

   

  });

  
</script>

