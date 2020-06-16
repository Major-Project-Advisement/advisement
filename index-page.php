<!DOCTYPE html>
<html lang="en">
<header>
  <script src="js/jquery-3.5.1.js"></script> 
  <link rel="stylesheet" href="css/index.css">
  <a href="#" ></a>
  <ul>
    <li><a id="home" style="text-decoration:underline; font-weight: bold;" href="#">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a id="student" href="#">Student</a></li>
    <li><a id="advisor" href="#">Advisor</a></li>
  </ul>

</header>

<body>
  <section class="showcase">

    <div class="content blur">
      <img src="images/academics-white.png" class="logo" alt="logo">
      <div class="title">
        Advisement System
      </div>
      <div class="text">
        Bridging the gap between advisor and advisee with a simple and user friendly interface.
      </div>
    </div>

    <!--Student options -->
    <div hidden id="studentOptions" class="content" style="margin-left: -245px; width: 500px;">
      <div style="width: 43%; float:left;">
          <a href="studentRegister.php"><img src="images/registericon.png" class="logo" alt="register"></a>
            <div class="title">
              Sign Up
            </div>
      </div>

      <div style="width: 43%; float:right;">
      <a href="studentLogin.php"><img src="images/signinicon.png" class="logo" alt="signin"></a>
            <div class="title">
              Sign In
            </div>
      </div>
    </div>

      <!-- Advisor options -->
    <div hidden id="advisorOptions" class="content" style="margin-left: -245px; width: 500px;">
      <div style="width: 43%; float:left;">
      <a href="advisorRegister.php"><img src="images/registericon.png" class="logo" alt="register"></a>
            <div class="title">
              Sign Up
            </div>
      </div>

      <div style="width: 43%; float:right;">
      <a href="advisorLogin.php"><img src="images/signinicon.png" class="logo" alt="signin"></a>
            <div class="title">
              Sign In
            </div>
      </div>
      

     
    </div>

   

  </section>



  <!-- Services -->
  <section class="services">
    <div class="container grid-3 center">
      <div>

        <a href="#" style=" color: inherit; text-decoration: none;">
          <h3>Students</h3>
        </a>
        <p>Student hub for tracking progess in the pursuit of their degree. Featuring easy to use hub to communicate with advisors to get the help they need to complete goals</p>
      </div>
      <div>

        <a href="#" style=" color: inherit; text-decoration: none;">
          <h3>Advisors</h3>
        </a>
        <p>A central place to view the many students assigned to them at a glance. Foster greater relationship with students with chat system.</p>
      </div>
      <div>

        <a href="#" style=" color: inherit; text-decoration: none;">
          <h3> Ultimate Goal</h3>
        </a>
        <p>Graduation! </p>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="about bg-light">
    <div class="container">
      <div class="grid-2">
        <div class="center">
          <img src="images/student.jpeg" alt="utech">
        </div>
        <div>
          <h3>About Us</h3>
          <p>Academic advisement is a structured support system available to every student
             when making important academic decisions related to his or her course of study. 
             Those decisions may include identifying available programme options, selecting 
             electives and reviewing academic progress (UTECH Jamaica, 2019). </p>
        </div>
      </div>
    </div>
  </section>
</body>


<footer class="center bg-dark">
  <p>FENC Advisement &copy; Class of 2020</p>
</footer>

<script type="text/javascript">
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0)
  })

  $(document).ready(() => {
      
      $("#student").click(()=>{
        $("#advisorOptions").attr("hidden","")
        $("#studentOptions").removeAttr("hidden")
        $(".blur").attr("hidden","")

        $("#student").css({"text-decoration":"underline"," font-weight":"bold"})
        $("#home, #advisor").css({"text-decoration":""," font-weight":""})

      });

      $("#advisor").click(()=>{
        $("#studentOptions").attr("hidden","")
        $("#advisorOptions").removeAttr("hidden")
        $(".blur").attr("hidden","")

        $("#advisor").css({"text-decoration":"underline"," font-weight":"bold"})
        $("#home, #student").css({"text-decoration":""," font-weight":""})
      });

      $("#home").click(()=>{
        $("#advisorOptions").attr("hidden","")
        $("#studentOptions").attr("hidden","")
        $(".blur").removeAttr("hidden")

        $("#home").css({"text-decoration":"underline"," font-weight":"bold"})
        $("#student, #advisor").css({"text-decoration":""," font-weight":""})
      });


      


  });


</script>

</html>