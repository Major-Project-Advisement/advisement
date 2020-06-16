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
            <a class="dropdown-item" href="#">Message</a>
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
        <a class="nav-link" href="#">Welcome '.$username.'</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>';
      }else {
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Welcome</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="studentLogin.php">login</a>
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


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>