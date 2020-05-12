<?php 
Session_start();//continue session
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <!-- custom styles -->
    <link rel="stylesheet" href="css/neutralStyle.css">
  

    <!-- material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <title>Student | <?php echo $title; ?></title>
  </head>
  <body>


<!-- navbar start  -->
<nav class="navbar navbar-default navbar-expand-md navbar-dark">
  <a href="#"><img style="height:35px; width:35px; filter: invert(100%);" src="images/logo.png"> </img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      
    </ul>

    <ul class="navbar-nav  navbar-right">

    <li class="nav-item">
        <a class="nav-link" href="landingPage.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign Up</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="studentLogin">As Student </a>
          <a class="dropdown-item" href="advisorLogin">As Advisor </a>
          
        </div>
      </li>
      
      
    </ul>

    
    
  </div>
</nav>
<!-- navbar end -->




<!-- carousel-->
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
	    <ol class="carousel-indicators">
	    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    	<li data-target="#myCarousel" data-slide-to="1"></li>
	    	<li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>
  	<div class="carousel-inner">
	    <div class="carousel-item active" data-interval="5000">
	      <img class="carousel-img" src="images/carousel-2.jpg" >
	      <div class="carousel-caption d-md-block">
	        <h5>Carousel 1 Image</h5>
	        <a href="#" target="_blank"><button type="button" class="btn btn-outline-light btn-lg">Carousel 1 Link</button></a>
	      </div>
    	</div>
	    <div class="carousel-item">
	      <img class="carousel-img" src="images/carousel-1.jpg">
	      <div class="carousel-caption d-md-block">
	        <h5>Carousel 2 Image</h5>
	        <a href="#" target="_blank"><button type="button" class="btn btn-outline-light btn-lg">Carousel 2 Link</button></a>
	      </div>
	    </div>
	    <div class="carousel-item">
	      <img class="carousel-img" src="images/carousel-3.jpg" >
	      <div class="carousel-caption d-md-block">
	        <h5>Carousel 3 Image</h5>
	        <a href="#" target="_blank"><button type="button" class="btn btn-outline-light btn-lg">Carousel 3 Link</button></a>
	      </div>
	    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- carousel  end-->


<!-- main start --> 
<section id="main">
  <div class="container-fluid padding">
    <div class="row text-center padding">
      <div class="col-12">
        <h2 class="welcome-text grey-text">WELCOME TO FENC ADVISEMENT</h2>
      </div>
      <div class="col-md-4">
        <div class="jumbotron">
          <img class="welcome-img" src="images/study.jpg">
          <h3 class="precaution-text">Personal Study</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="jumbotron">
          <img class="welcome-img" src="images/summer.jpg">
          <h3 class="precaution-text">Summer Session</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="jumbotron">
          <img class="welcome-img" src="images/global.jpg">
          <h3 class="precaution-text">Global Education</h3>
          </div>
      </div>
    </div>
  </div>

  <div class="container-fluid padding register">
    <div class="row text-center padding">
      <div class="col-md">
        <a href="studentlogin.php"><button type="button" class="btn btn-outline-dark btn-lg">
          <h3 class="signin-text" id="signin-text">Sign In<small>For Students</small></h3>
        </button></a>
        <a href="studentlogin.php"><button type="button" class="btn btn-outline-dark btn-lg">
          <h3 class="signin-text" id="signin-text">Sign In<small>For Advisors</small></h3>
        </button></a>
        <a href="studentlogin.php"><button type="button" class="btn btn-outline-dark btn-lg">
          <h3 class="signin-text" id="signin-text">Sign Up<small> .</small></h3>
        </button></a>
      </div>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>