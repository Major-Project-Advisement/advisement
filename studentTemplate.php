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
    <?php echo $style; ?>

    <!-- material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


    <title>Student | <?php echo $page_title; ?></title>
  </head>
  <body>


    <!-- navbar start  -->
    <nav class="navbar navbar-default navbar-expand-md navbar-dark">
      <a href="index-page.php"><img style="height:35px; width:35px;" src="images/academics-white.png"> </img></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <?php
            if(isset($username)){
              echo '<li class="nav-item">
              <a class="nav-link" href="studentresources.php">Resources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentModules.php">Modules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentUpdate.php" tabindex="-1" aria-disabled="true">Update</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Advisor</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">View</a>
                <a class="dropdown-item" href="#CreateMessage" data-toggle="modal" data-target="#CreateModal">Message</a>
                <a class="dropdown-item" href="#">Request meeting</a>
              </div>
            </li>';

            }
        ?>
          
        </ul>

        <ul class="navbar-nav  navbar-right">
        <?php 

          if(isset($username)){
            echo '<li class="nav-item">
            <a class="nav-link">Welcome '.$username.'</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>';
          }
          else if($page_title == 'Registration'){
            echo '<li class="nav-item">
            <a class="nav-link">Welcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="studentLogin.php">login</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link">Welcome</a>
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
                <label>To: <b>Insert PHP Code Here</b></label>
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

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>