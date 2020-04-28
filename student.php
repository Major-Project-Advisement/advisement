<?php 

include_once 'includes/config.php';

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
    <link rel="stylesheet" href="css/style.css">

    <!-- material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <title>Student | Profile</title>
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
      <li class="nav-item">
        <a class="nav-link" href="#">Resources<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Modules</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Update</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Advisor</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">View</a>
          <a class="dropdown-item" href="#">Message</a>
          <a class="dropdown-item" href="#">Request meeting</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav  navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome, Kerone</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Logout</a>
      </li>
      
      
    </ul>

    
    
  </div>
</nav>
<!-- navbar end -->




<!-- header start   -->
<header id="header">
  <div class="container" >
    
    <div class="row"> 
      <div class="col-md-12"> 
        <h3> <span class="material-icons">home</span> Dashboard</h3>
      </div>
      
    </div>

  </div>
</header>
<!-- header end   -->


<!-- beadcrumb -->
<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li> Dashboard </li>
    </ol>
  </div>
</section>
<!-- beadcrumb end -->


<!-- main start--> 
<section id="main">
  <div class="container">
    <div class="row">
      <!-- sidebar -->
        
      <!-- profile -->

      <div class="col-md-3">

        <div class="card" style="text-align: center">
				<!-- SIDEBAR USERPIC -->
        <div class="card-body">
				<div class="profile-userpic">
					<img src="images/profilepic.jpeg" class="img-responsive" alt="profile picture">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Kerone Creary
					</div>
					<div class="profile-usertitle-job">
						Aspiring Developer
					</div>
        </div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				</div>
        <br/>
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active main-color-bg">
          <span class="material-icons">school</span> Progress</a>
        <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
          Completed <span class="badge badge-dark">40</span></a>
        <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action ">
          Level  <span class="badge badge-dark">4</span> </a>
        <a href="#" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
          Remaining  <span class="badge badge-dark ">7</span></a>
        </div>
        
        <br>
      </div>
      <!-- main document -->
      <div class="col-md-9">

        <div class="card">
          <div class="card-header main-color-bg">
           <span class="material-icons">account_box</span> Overview
          </div>

         <div class="card-body row">
            <div class="col-4" style="text-align: center;">

              <div class="well dash-box">
                <h2><span class="material-icons">inbox</span> 5</h2>
                <h4>Inbox</h4>

              </div>

            </div>

            <div class="col-4" style="text-align: center;">

              <div class="well dash-box">
                <h2><span class="material-icons">inbox</span> 5</h2>
                <h4>Inbox</h4>

              </div>

            </div>

            <div class="col-4" style="text-align: center;">

              <div class="well dash-box">
                <h2><span class="material-icons">inbox</span> 5</h2>
                <h4>Inbox</h4>

              </div>

            </div>

          </div>

        </div>

<br>
        <div class="card" >
            <div class="card-header main-color-bg">
              Current Modules
            </div>

            <table class="table table-striped table hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Module Code</th>
                  <th>Type</th>
                  <th>Credits</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>


            
          </div>


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