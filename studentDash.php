<?php 
    Session_start();//continue/start session

    var_dump($_SESSION);

    $title="Profile";
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
                  <img src="images/profilepic.jpeg" class="img-responsive" alt="profile picture">
              </div>
              <!-- END SIDEBAR USERPIC -->
              <!-- SIDEBAR USER TITLE -->
              <div class="profile-usertitle">
                  <div class="profile-usertitle-name">
                      Kerone Creary
                  </div>
                  <div class="profile-usertitle-job">
                      Aspiring Developer
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
                  <h2><span class="material-icons">inbox</span> 5</h2>
                  <h4>Inbox</h4>
  
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
    include 'studentTemplate.php';

?>