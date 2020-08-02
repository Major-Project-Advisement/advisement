<?php
  include_once 'includes/config.php';
  $Valid = null;
  if(isset($AdvisorID)){
    //Code to Select all the students and place them in a drop down selector
    $sql = "SELECT * FROM student where AdvisorID='".$AdvisorID."'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
      //Print the students ID and their full name
     // echo '<option>'.$row['StudentID'].' - '.$row['FirstName'].' '.$row['LastName'].'</option>';
     $Valid .= '
      <option value="'.$row['UID'].'">'.$row['UID'].' - '.$row['FirstName'].' '.$row['LastName'].'</option>
     ';
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
    <link rel="stylesheet" href="css/advisorStyle.css">
    

    <!-- material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <title>Advisor | <?php echo $page_title; ?></title>
  </head>
  <body>

<!-- navbar start  -->
<!-- navbar start  -->
<nav class="navbar navbar-default navbar-expand-md navbar-dark">
  <a <?php if(isset($username)){ echo 'href="advisorDash.php"';}else{echo 'href="index-page.php"';} ?>><img style="height:35px; width:35px;" src="images/academics-white.png"> </img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <?php
        if(isset($username)){
          echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Students</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="advisorViewStudents.php" >View</a>
            <a class="dropdown-item" href="#CreateMessage" data-toggle="modal" data-target="#CreateMessage">Message</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="advisorUpdate.php" tabindex="-1" aria-disabled="true">Account</a>
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
        else{
          if($page_title == 'Registration'){
           echo  '<li class="nav-item">
            <a class="nav-link" href="#">Welcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="advisorLogin.php">Login</a>
          </li>';


          }else{
            echo '<li class="nav-item">
                  <a class="nav-link" href="#">Welcome</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="advisorRegister.php">Sign up</a>
                </li>';
          }
        }
      
      ?>
      
      
      
    </ul>

    
    
  </div>
</nav>
<!-- navbar end -->
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
  echo '<div class="modal fade" id="CreateMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="advisorMessage.php" method="post" id="register_form" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send A Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>From: <b>Me</b></label>
            <br>
            <label>To: </label>
            <select id="Recipient" name="Recipient">
            <option>Please Select A Recipient</option>
          '.$Valid.'
            </select>
          </div>  
          <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Subject">
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea type="text" name="message" class="form-control" placeholder="Message"></textarea>
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

<!-- Read Message Modal-->
<div class="modal fade" id="ReadMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h1 id="Subject"></h1>
                    <p id="MessageContent"></p>
                   
                  </div>
                  <div class="modal-footer">
                    <button id="CloseMessage" type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button id="ReplyMessage" type="button" class="btn btn-primary" data-dismiss="modal" href="#CreateModal" data-toggle="modal" data-target="#CreateModal">Reply</button>
                  </div>
                
              </div>
            </div>
          </div>
          

<!-- Read Message Modal-->
<div class="modal fade" id="ReadMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h1 id="Subject"></h1>
                    <p id="MessageContent"></p>
                   
                  </div>
                  <div class="modal-footer">
                    <button id="CloseMessage" type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button id="ReplyMessage" type="button" class="btn btn-primary" data-dismiss="modal" href="#CreateMessage" data-toggle="modal" data-target="#CreateMessage">Reply</button>
                  </div>
                
              </div>
            </div>
  </div>';
?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.js"></script> 
    <script src="js/jquery.validate.min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>