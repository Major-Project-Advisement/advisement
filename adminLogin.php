<?php 


    $page_title="Login";

    $header="Admin Login";

    $style='';

    $crumb='';

    $sidebar='';

    $main = '<div id="container" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><br><br>
            <div class="card">
                <div class="card-header main-color-bg">Login</div>
                <div class="card-body">
                    <form id="login_form" action="adminLoginValid.php" method="POST">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">User ID</label>
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

                        
                        <div align="center">
                            <button type="submit" name="submit" id="submit-button" class="btn btn-light btn-lg">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>      
            </div>
        </div>  
    </div>
</div>';




    include 'adminTemplate.php';

?>