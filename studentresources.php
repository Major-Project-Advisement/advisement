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
    
      

    $username = $FirstName;
    $page_title="Resources";
    $header="My Resources";
    $style='';

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="studentDash.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Resources</li>
      </ol>
    </nav>
    </div>';

    $sidebar = '';



    $main = '<div class="container col-md-12">         
                <!-- Webpage Content Starts here -->
                <div class="">
            
                <table class="table table-striped table hover">
                <thead>
                  <tr>
                    <th colspan="2">Resources</th>
                  </tr>
                </thead>
  
                <tbody  id="currentmodules" data="'.$UID.'" >
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout</a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  
               
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Hi</td>
                    <td><a href="studentEditPassword.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  
                </tbody>

                
              </table>
                    
            
                </div>
            
            </div>';
  
    
  
    include 'studentTemplate.php';

?>
