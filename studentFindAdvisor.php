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

      include_once "includes/config.php";

      $sql = "SELECT * FROM advisor WHERE SchoolID in(SELECT SchoolID FROM program WHERE ProgramID = $ProgramID) ORDER BY LastName ASC";


      $result = mysqli_query($conn, $sql);
      $advisorList = "";
      $headerLetter="";
      
      while ($row = mysqli_fetch_assoc($result)){

        if($headerLetter != $row["LastName"][0]){
          $headerLetter = $row["LastName"][0];

          $advisorList = $advisorList.' <li class="collection-header">
                          <h5>'.$row["LastName"][0].'</h5>
                          </li>';
        }

        $advisorList = $advisorList.' <li class="collection-item">
                        <h4><a class="advisor-item text-primary" style="cursor: pointer;">'.$row["Title"].' '.$row["LastName"].', '.$row["FirstName"].'</a></h4>
                        </li>';


      }


    }

    $username = $FirstName;
    $page_title="Profile";
    $header="Dashboard";
    $style='';

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="studentDash.php">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Advisors</li>
      </ol>
    </nav>
    </div>';

    $sidebar = '';



    $main = '
        <!-- main document -->
        <div class="col-md-12">
        
          <div class="card">
            <div id="advisorSearch" data="'.$ProgramID.'" class="card-body">
            
            
              <div class="container">
                <h1 class="col-md-6 offset-md-3 col-12 mb-3" style="text-align:center">
                <span id="programName"></span> Advisors
                 
                </h1>
                <input type="text" id="filterInput" class="form-control col-md-8 offset-md-2 col-ms-8 offset-ms-2 mb-2 col-12" placeholder="Search names...">
                <div class="col-md-6 offset-md-2 offset-ms-2 col-12" >
                <ul id="names" style="list-style: none; padding-left:0;" >
                 '.$advisorList.'
                </ul>
                </div>
              </div>
            </div>
          </div>
  
          
        </div>
          
        ';
    include 'studentTemplate.php';

?>


<script>
    $(document).ready(()=>{

      //get name of program
    $.ajax({

        url: "getProgramName.php",
        method: "POST",
        data:{programId : $("#advisorSearch").attr('data')},
        dataType: "text",
        async: false,
        success: function (html){
            
            if (html != ""){

                $("#programName").html(html);
                
            } 
            else 
            {
                //display error
                $("#programName").html("");
               
            }
        }
        
    });
    
    })
    // Get input element
    let filterInput = document.getElementById('filterInput');
    // Add event listener
    filterInput.addEventListener('keyup', filterNames);

    function filterNames(){
      // Get value of input
      let filterValue = document.getElementById('filterInput').value.toUpperCase();

      // Get names ul
      let ul = document.getElementById('names');
      // Get lis from ul
      let li = ul.querySelectorAll('li.collection-item');

      // Loop through collection-item lis
      for(let i = 0;i < li.length;i++){
        let a = li[i].getElementsByTagName('a')[0];
        // If matched
        if(a.innerHTML.toUpperCase().indexOf(filterValue) > -1){
          li[i].style.display = '';
        } else {
          li[i].style.display = 'none';
        }
      }

    }
  </script>
</script>