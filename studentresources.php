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
                    <td class="col-10">UTechs Website</td>
                    <td><a href="http://utech.edu.jm/" class="btn btn-info"> Checkout</a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Moodle</td>
                    <td><a href="https://utechonline.utech.edu.jm/login/index.php" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Calvin McKain Library</td>
                    <td><a href="http://library.utech.edu.jm/client/en_GB/default" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">University Forms</td>
                    <td><a href="http://utech.edu.jm/forms" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Student Handbook</td>
                    <td><a href="http://utech.edu.jm/publications/studentHandbook/index.html" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Student Portal</td>
                    <td><a href="https://evisionweb.utech.edu.jm/sipr/" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  
                </tbody>

                <thead>
                  <tr>
                    <th colspan="2">Resources</th>
                  </tr>
                </thead>

                <tbody  id="currentmodules" data="'.$UID.'" >
                  <tr>
                    <td class="col-10">Campus Map</td>
                    <td><a href="http://utech.edu.jm/campus-map" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Admission/Course of Study</td>
                    <td><a href="http://utech.edu.jm/admissions/admissions" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">COVID-19 Preparedness and Updates</td>
                    <td><a href="http://utech.edu.jm/covid19" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Social Media - Facebook</td>
                    <td><a href="https://www.facebook.com/UTechJa/" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Social Media - Twitter</td>
                    <td><a href="https://twitter.com/utechjamaica" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Social Media - Instagram</td>
                    <td><a href="https://twitter.com/utechjamaica" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  <tr>
                    <td class="col-10">Social Media - YouTube</td>
                    <td><a href="https://www.youtube.com/user/utechjamaica" class="btn btn-info"> Checkout </a></td>
                  </tr>
                  
                </tbody>

                
              </table>
                    
            
                </div>
            
            </div>';
  
    
  
    include 'studentTemplate.php';

?>
