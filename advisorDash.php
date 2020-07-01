<?php 
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
                  <h2><span class="material-icons">inbox</span> 5</h2>
                  <h4>Inbox</h4>
  
                </div>
  
              </div>
  
              <div class="col-4" style="text-align: center;">
  
                <div class="well dash-box">
                  <h2><span class="material-icons">work</span> 5</h2>
                  <h4>Meetings</h4>
  
                </div>
  
              </div>
  
              <div class="col-4" style="text-align: center;">
  
                <div class="well dash-box">
                  <h2><span class="material-icons">people_alt</span> 15</h2>
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