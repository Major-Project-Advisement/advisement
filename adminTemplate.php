<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-lumen.css">
    

    <!-- custom styles -->
    <link rel="stylesheet" href="css/adminStyle.css">
    

    <!-- material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <title>Admin | <?php echo $page_title; ?></title>
  </head>
  <body>


<!-- navbar start  -->
<nav class="navbar navbar-default navbar-expand-md navbar-dark">
  <a <?php if(isset($username)){ echo 'href="adminDash.php"';} else {echo 'href="index-page.php"';} ?>><img style="height:35px; width:35px;" src="images/academics-white.png"> </img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    <?php
        if(isset($username)){

          echo '<li class="nav-item">
          <a class="nav-link" href="studentFindAdvisor.php">Advisor</a>
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
      }
      else {
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Welcome</a>
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
        <h3> <span class="material-icons">settings</span> <?php echo $header; ?> </h3>
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
    <script src="js/jquery-3.5.1.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php echo $style; ?>

   
  </body>
</html>