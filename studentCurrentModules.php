<?php 
    Session_start();//continue/start session

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
  
        if($IsActive == 1){
          $status = 'Active';
        }
        else
        {
          $status = 'Inactive';
        }
  
      }
      
      if($ProgramID == 1){
        $program_name = "";
      }
      

    $username = $FirstName;
    $page_title="Modules";
    $header="Current Modules";
    $style='<script src="js/current-modules.js"></script>';

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="studentDash.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modules</li>
      </ol>
    </nav>
    </div>';

    $sidebar = '';



    $main = '<div class="container col-md-12">
    <div class="title text-center">
        <h1>Remaining Modules for <span id="programName"></span></h1>
        <p>Click to indicate the modules you are currently enrolled in</p>
    </div>
    <div id="module-list" page="current" student="'.$_SESSION['UID'].'" data="'.$ProgramID.'" class="row">
        
               
    </div>
</div>';

    include 'studentTemplate.php';

?>

    