<?php 
    Session_start();//continue/start session

    if(isset($_SESSION['AdvisorID'])){
        include_once "includes/config.php";
      
        foreach($_SESSION as $key => $value){ //create local variables based on $_SESSION keys and values
          $$key = $value;
        }
        
        if($Image == 'null'){
          $Image = 'images/placeholder.jpg';
        }else{
          $Image = 'uploads/'.$Image;
        }
  
        if($IsActive == 1){
          $status = 'Active';
        }else{
          $status = 'Inactive';
        }
  
    }
      

    $sql="SELECT * FROM student WHERE AdvisorID = $AdvisorID";
    
    $result = mysqli_query($conn, $sql);
    
    $Students = '';
    
    while($row = mysqli_fetch_assoc($result)){

        if($row['Image'] == 'null'){
            $Picture = 'images/placeholder.jpg';
        }else{
            $Picture = 'uploads/'.$row['Image'];
        }

        if($row['ProgramID'] > 6){
            $School = 'School of Engineering';
        }else{
            $School = 'School of Computing and Information Technology';
        }

        $ID = $row['StudentID'];
        $Name = $row['FirstName'] . $row['LastName'];
        $Email = $row['Email'];
        $Phone = $row['Phone'];

       
        $Students = $Students. '
            <tr>
                <td><img style="height:50px; width: auto;" src="'.$Picture.'"> </img></td>
                <td>'.$ID.'</td>
                <td>'.$Name.'</td>
                <td>'.$School.'</td>
                <td>'.$Email.'</td>
                <td>'.$Phone.'</td>
            </tr>
        
        ';
    }

    $username = $FirstName;
    $page_title="All Students";
    $header="My Students";
    $style='<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/profilepage.css" />';

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="studentDash.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Students</li>
    </ol>
    </nav>
    </div>';

    $sidebar = '<h1 class="col-md-6 offset-md-3 col-12 mb-3" style="text-align:center">
    Student List
     
    </h1>';



    $main = '

        <table class="table" width="100%">
            <tr>
                <th>Image</th>
                <th>ID Number</th>
                <th>Name</th>
                <th>School</th>
                <th>Email Address</th>
                <th>Phone Number</th>
            </tr>
            '.$Students.'


        </table>

    ';

    include 'advisorTemplate.php';

?>

    