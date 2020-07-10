<?php 
    Session_start();//continue/start session

    if(isset($_SESSION['StudentID'])){
        foreach($_SESSION as $key => $value) //create local variables based on $_SESSION keys and values
        {
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
      
    if((isset($_SESSION['errFlag'])) && ($_SESSION['errFlag'])==1) //if the session error flag exist and is equal to 1
    {
        //var_dump($_SESSION);
        foreach($_SESSION as $key => $value){
            $$key = $value;
        }
        
    }
    else{
        // DEFINE DEFAULT INFO on START UP
        $newval ="";
        $error = "";
        
    }

    $username = $FirstName;
    $page_title="Account";
    $header="My Account";

    $crumb='<div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="studentDash.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account</li>
        </ol>
        </nav>
    </div>';

    $sidebar = '';

    $main = '<div class="container col-md-12">         
                <!-- Webpage Content Starts here -->
                <div class="col-md-6 offset-md-3">
            
                <div class="card ">
                <div class="card-header main-color-bg">Change '.$_GET['name'].'</div>
                <div class="card-body">
                    <form id="login_form" action="advisorEditValid.php" method="POST">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">'.$_GET['name'].'</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="newval" placeholder="'.$_GET['current'].'"required="" autofocus="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="error col-md-6 offset-md-4 text-danger">'.$error.'<label> 
                        </div>

                        <!--hidden fields to hold column name, previous value and name of attribute -->
                        <input type="hidden" name="column" value="'.$_GET['edit'].'">
                        <input type="hidden" name="preval" value="'.$_GET['current'].'"> 
                        <input type="hidden" name="attribute" value="'.$_GET['name'].'"> 

                        <div style="float: right">
                            <button type="submit" name="editSubmit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>      
            </div>
            
                </div>
            
            </div>';
  
    
  
    include 'advisorTemplate.php';

?>

    