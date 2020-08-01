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

      //total number of users
      $sql = 'SELECT count(*) as count from 
      (Select Title, FirstName, LastName, "Student" as Type, CreatedOn as Joined from student 
      UNION 
      Select Title, FirstName, LastName, "Advisor" as Type, CreatedOn as Joined from advisor)a';

      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $users = $row["count"];

      //total number of messages
      $sql = 'SELECT count(*) as count from message';

      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $sent_messages = $row["count"];

      //total meetings accepted
      $sql = 'SELECT count(*) as count from meeting where Status = "Accepted"';

      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $meetings_accepted = $row["count"];
      

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
        <a href="#" class="list-group-item list-group-item-action main-color-bg">
          <span class="material-icons">settings</span> Dashboard</a>
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

      <div id="latestUsers" class="card overview-card mb-3"  >
        <div class="card-header main-color-bg">
          Lastest Users
        </div>

          <table class="table table-striped table hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Type</th>
                <th>Joined</th>
              </tr>
            </thead>

            <tbody  id="latestusers"  data="1" >
              
            </tbody>
          </table>
          <div id="latestuserserror" class="col-12" style="text-align: center">
          
          </div>
      </div>
 

    </div>
';
    include 'adminTemplate.php';

?>

<script>
  $(document).ready(function(){

    //ajax call for populating The Overview
    $.ajax({

            url: "getAdminOverview.php",
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

      url: "getLatestUsers.php",
      method: "POST",
      data:{uid : $("#latestusers").attr('data')},
      dataType: "text",
      async: false,
      success: function (html){
          
          if (html.length != 3 ){
              $("#latestusers").html(html);
          } else {
              //display error
              $("#latestuserserror").html('<p>You have no meetings at this time</p>');
          }
      }

      });   

  });

  
</script>

