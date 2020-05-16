

<?php 


    $title="Registration";

    $header="Advisor Registration";

    $style='<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';

    $crumb='';

    $sidebar='';

    $main = '<div class="container box" style="max-width: 800px;">
                <h2 align="center">
                Registration form
                </h2>
                <form method="post" id="register_form" >
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                        <a href="" class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Login</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link inactive_tab1" style="border:1px solid #ccc" id="list_personal_details">Personal</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link inactive_tab1" style="border:1px solid #ccc" id="list_contact_details">Contact</a>
                        </li>
                    </ul>

                    <div class="tab-content" style:"margin-top: 50px;">
                        <div class="tab-pane fade" id="login details">
                        
                            <div class="card border-light" >
                                <div class="card-header main-color-bg">Step 1</div>
                                    <div class="card-body">
                                        <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">
                                                <div class="form-group">
                                        
                                                    <label>Enter Identification number</label>
                                                    <input required type="text" name="UID" id="UID" class="form-control"> 
                                                    <span id="error_ID" class="text-danger"></span> 

                                                </div>

                                                <div class="form-group">
                                        
                                                    <label>Enter Password</label>
                                                    <input required type="password" name="password" id="password" class="form-control"> 
                                                    <span id="error_password" class="text-danger"></span> 

                                                </div>

                                                <div class="form-group">
                                                
                                                    <label>Confirm Password</label>
                                                    <input required type="password" name="confirm" id="confirm" class="form-control"> 
                                                    <span id="error_confirm" class="text-danger"></span> 

                                                </div>
                                        </div>

                                        <br/>

                                        <div align="center">
                                            <button 
                                                type="button" 
                                                name="btn_login_details" 
                                                id="btn_login_details" 
                                                class="btn btn-light btn-lg">
                                                Next
                                            </button>
                                        </div>

                                    </div>
                                

                                </div>
                            </div>

                        </div>


                        <div class="tab-pane active" id="person_details">
                        
                            <div class="card border-light" >
                                <div class="card-header main-color-bg">Step 2</div>
                                    <div class="card-body">
                                        <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">

                                                <div class="form-group" style="max-width: 80px">
                                        
                                                        <label>Title</label>
                                                        <select class="form-control">
                                                            <option>Dr.</option>
                                                            <option>Miss</option>
                                                            <option>Mr</option>
                                                            <option>Mrs</option>
                                                            
                                                        </select>
                                                </div>

                                                <div class="form-group">
                                        
                                                    <label>Enter First Name</label>
                                                    <input required type="text" name="fname" id="fname" class="form-control"> 
                                                    <span id="error_fname" class="text-danger"></span> 

                                                </div>

                                                <div class="form-group">
                                        
                                                    <label>Enter Last Name</label>
                                                    <input required type="text" name="lname" id="lname" class="form-control"> 
                                                    <span id="error_lname" class="text-danger"></span> 

                                                </div>

                                                <div class="form-group">
                                                
                                                    <label>School</label>
                                                    <select class="form-control">
                                                        <option>SCIT</option>
                                                        <option>SOE</option>
                                                    </select>

                                                </div>
                                        </div>

                                        <br/>

                                        <div align="center">
                                            <button 
                                                type="button" 
                                                name="previous_btn_personal_details" 
                                                id="previous_btn_personal_details" 
                                                class="btn btn-light btn-lg">
                                                Prev
                                            </button>
                                            <button 
                                                type="button" 
                                                name="btn_personal_details" 
                                                id="btn_personal_details" 
                                                class="btn btn-light btn-lg">
                                                Next
                                            </button>
                                        </div>

                                    </div>
                                

                                    </div>
                                </div>

                                </div>
                            </div>

                            

                    </div>


                    
                </form>
            </div>';

    include 'advisorTemplate.php';

?>

<div class="container box">
                