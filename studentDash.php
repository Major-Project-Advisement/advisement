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
       
           <div id="overview" data="'.$UID.'"  class="card-body row">
             
  
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
              <div id="currentmoduleserror" class="col-12" style="text-align: center">
              
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

  });
</script>

