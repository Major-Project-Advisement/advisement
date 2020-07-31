<?php 
Session_start();//continue/start session

if((isset($_SESSION['errFlag'])) && ($_SESSION['errFlag'])==1) //if the session error flag exist and is equal to 1
{
	//retrieve session variables	
	foreach($_SESSION as $key => $value)
	{
		$$key = $value;
	}
		
}
else
{
    // DEFINE DEFAULT INFO on START UP
    $UID="";

    $error="";
}

$page_title="Login";

$header="Advisor Login";

$style='';

$crumb='';

$sidebar='';

$main = '<div id="container"class="container">
<div class="row justify-content-center">
  
  <div class="col-md-8">
      <br>
  <br>
            <div class="card">
                <div class="card-header main-color-bg">Login </div>
                <div class="card-body">
                    <form id="login_form" action="advisorLoginValid.php" method="POST">
                        <div class="form-group row">
                            <label for="UID" class="col-md-4 col-form-label text-md-right">User ID</label>
                            <div class="col-md-6">
                                <input maxlength="7" value="'.$UID.'" type="text" id="UID" class="form-control" name="UID" required="" autofocus="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required="">
                            </div>
                        </div>
                        
                        <div align="center">
                            <button type="submit" name="submit-button" id="submit-button" class="btn btn-light btn-lg">
                                Sign In
                            </button>
                        </div>
                        
                </form></div>
                
            </div>
        </div>
    
</div>

  

</div>';
include_once 'advisorTemplate.php';

?>

<script>
$(document).ready(()=>{

    $('#login_form').validate({

        rules: {
            UID: {
                required: true,
                digits: true

            },
            password: {
                required: true

            }
            
        },
        messages: {
            UID: {
                required: '<span class="text-danger">Enter user ID</span>',
                digits: '<span class="text-danger">user ID must be all digits</span>'
            },
            password: {
                required: '<span class="text-danger">Enter password</span>'

            }

        }

    });
   
});
</script>

