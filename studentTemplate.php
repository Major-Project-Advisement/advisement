<?php

  if(isset($AdvisorID)){
    $date = date('Y/m/d');

    //Create a SQL statement to get the Advisors name using $AdvisorID and set it to a variable to use for the modal
    $sql = "SELECT * FROM `advisor` WHERE `AdvisorID` = '".$AdvisorID."' LIMIT 1 ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $AdvisorFirstName = $row['FirstName'];
    $AdvisorLastName = $row['LastName'];
    $AdvisorImage = $row['Image'];
    if($AdvisorImage == 'null'){
      $AdvisorImage = 'images/placeholder.jpg';
    }else{
      $AdvisorImage = 'uploads/'.$AdvisorImage;
    }
    $AdvisorPhone = $row['Phone'];
    $AdvisorEmail = $row['Email'];
    $AdvisorTitle = $row['Title'];
    $AdvisorSchool = $row['SchoolID'];

    if($AdvisorSchool == 1){
      $AdvisorSchool = "School of Computing and Information Technology";
    }else{
      $AdvisorSchool = "School of Engineering";
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-lumen.css">
    

    <!-- custom styles -->
    <link rel="stylesheet" href="css/studentStyle.css">
    

    <!-- material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <title>Student | <?php echo $page_title; ?></title>
  </head>
  <body>


<!-- navbar start  -->
<nav class="navbar navbar-default navbar-expand-md navbar-dark">
  <a <?php if(isset($username)){ echo 'href="studentDash.php"';}else{echo 'href="index-page.php"';} ?>><img style="height:35px; width:35px;" src="images/academics-white.png"> </img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    <?php
        if(isset($username)){
          echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modules</a>
          <div class="dropdown-menu" aria-labelledby="dropdown02">
            <a class="dropdown-item" href="studentModules.php">Completed Modules</a>
            <a class="dropdown-item" href="studentCurrentModules.php">Current Modules</a>
            
          </div>
        </li>';

        if(!is_null($AdvisorID)){
          echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Advisor</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="studentViewAdvisor.php" >View</a>
            <a class="dropdown-item" href="#CreateMessage" data-toggle="modal" data-target="#CreateModal">Message</a>
            <a class="dropdown-item" href="#RequestMeeting" data-toggle="modal" data-target="#RequestMeeting">Request A Meeting</a>
          </div>
        </li>';
        }else{

          echo '<li class="nav-item">
          <a class="nav-link" href="studentFindAdvisor.php">Advisor</a>
          </li>';
        }
        
        
        echo '<li class="nav-item">
          <a class="nav-link" href="studentresources.php">Resources</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="studentUpdate.php" tabindex="-1" aria-disabled="true">Account</a>
        </li>

        ';

        }
    ?>
      
    </ul>

    <ul class="navbar-nav  navbar-right">
    <?php 

      if(isset($username)){
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Welcome '.$username.'</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>';
      }
      else if($page_title == 'Registration'){
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Welcome</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="studentLogin.php">login</a>
      </li>';
      }else{
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Welcome</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="studentRegister.php">Sign up</a>
      </li>';
      }
    ?>
     
      
      
    </ul>

    
    
  </div>
</nav>
<!-- navbar end -->




<!-- header start   -->
<header id="header">
  <div class="container" >
    
    <div class="row"> 
      <div class="col-md-12"> 
        <h3> <span class="material-icons">home</span> <?php echo $header; ?> </h3>
      </div>
      
    </div>

  </div>
</header>
<!-- header end   -->



<!-- breadcrumb -->
<?php echo $crumb; ?>
<!-- breadcrumb end -->



<!-- main start--> 
<section id="main">

<div class="container">
      <div class="row">
        <?php echo $sidebar; ?>
        <?php echo $main; ?>
      </div>
</div>

</section>
<!-- main end-->

<!-- Footer -->
<footer id="footer">

  <p>Copyright ScitAdvisement, &copy; 2020</p>

</footer>
<!-- Footer end -->

<?php

echo '
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="studentMessage.php" method="post" id="register_form" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>From: <b>Me</b></label>
                      <br>
                      <label>To: <b>'.$AdvisorFirstName.' '.$AdvisorLastName.'</b> </label>
                    </div>  
                    <div class="form-group">
                      <label>Subject</label>
                      <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <label>Message</label>
                      <input type="text" name="message" class="form-control" placeholder="Message">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="RequestMeeting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="studentMeeting.php" method="post" id="register_form" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request A Meeting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Time: <br><input type="time" id="MeetingTime" name="MeetingTime"
                      min="09:00" max="18:00" required> </label>
                      <br>
                      <label>Date: <br><input type="date" id="MeetingDate" name="MeetingDate"
                      value="'.$date.'"
                      min="'.$date.'" ></label>
                    </div>  
                    <div class="form-group">
                      <label>Topic:<br></label>
                      <select id="topic" name="topic" class="form-control">
                        <option value="Grades">Issue With Grades</option>
                        <option value="Course">Course Selection</option>
                        <option value="Personal">Personal Challlenges</option>
                        <option value="Financial">Financial Challenges</option>
                        <option value="Explanation">Explanation of Rules and Procedures</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Description:<br></label>
                      <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Request Meeting</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="ViewAdvisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="viewAdvisor.php" method="post" id="register_form" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Advisor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="profile-userpic text-center">
                      <img src="'.$AdvisorImage.'" class="img-responsive" alt="profile picture">
                    </div>
                    <div class="text-center full-name">
                      '.$AdvisorTitle.' '.$AdvisorFirstName.' '.$AdvisorLastName.'
                    </div>
                    <div class="text-center email-address">
                      '.$AdvisorEmail.'
                    </div>
                   
                    
                  </div>
                  <div class="modal-footer">
                    <button id="ConfirmAdvisor" type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                  </div>
                </form>
              </div>
            </div>
          </div>';

?>

          


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php echo $style; ?>

   
  </body>
</html>