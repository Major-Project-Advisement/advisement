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


      include_once "includes/config.php";

      $sql="SELECT * FROM advisor a LEFT JOIN 
      (SELECT AdvisorID as ID, count(*) as Students FROM student WHERE AdvisorID = $AdvisorID ) b 
      ON a.AdvisorID = b.ID
      WHERE a.AdvisorID = $AdvisorID";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      if($row["IsActive"]){
        $status = 'Active';
      }else{
        $status = 'Inactive';
      }

      if($row["SchoolID"] == 1){
        $advisorSchool = 'School of Computing and information Technology';
      }else{
        $advisorSchool = 'School of Engineering';
      }

      



      
      

    $username = $FirstName;
    $page_title="Advisor";
    $header="Advisor Profile";
    $style='<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/profilepage.css" />';

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="studentDash.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Advisor</li>
      </ol>
    </nav>
    </div>';

    $sidebar = '';



    $main = '<div class="container col-md-12">
    <div class="card">
        <div class="card-header">
            <img src="./uploads/'.$row["Image"].'" alt="Profile Image" class="profile-img">
        </div>
        <div class="card-body">
            <p class="full-name">'.$row["Title"].' '.$row["FirstName"].' '.$row["LastName"].'</p>
            <p class="username">'.$row["Email"].'</p>
            <p class="username">tel: '.$row["Phone"].'</p>
            <p class="city">'.$advisorSchool.'</p>
            <p class="desc">Allow me to help you in your pursuite of graduation</p>
          
        </div>
        <div class="card-footer">
            <div class="col vr">
                <p><span class="count">'.$row["Students"].'</span> Assigned Student(s)</p>
            </div>
            <div class="col">
                <p> Status <span class="count">'.$status.'</span></p>
            </div>
        </div>
    </div>
</div>';

    include 'studentTemplate.php';

?>

    