<?php 


$title="Login";

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
                <div class="card-header main-color-bg">login </div>
                <div class="card-body">
                    <form action="" method="">
                        <div class="form-group row">
                            <label for="UID" class="col-md-4 col-form-label text-md-right">User ID</label>
                            <div class="col-md-6">
                                <input type="text" id="UID" class="form-control" name="UID" required="" autofocus="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required="">
                            </div>
                        </div>

                        

                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Sign in
                            </button>
                        </div>
                </form></div>
                
            </div>
        </div>
    
</div>

  

</div>';
include_once 'advisorTemplate.php'
?>