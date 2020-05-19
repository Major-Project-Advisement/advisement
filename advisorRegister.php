<?php


$title = "Registration";

$header = "Advisor Registration";

$style = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';

$crumb = '';

$sidebar = '';

$main = '<div class="container box" style="max-width: 800px;">
<h2 align="center">
    Registration form
</h2>
<form method="post" id="register_form">
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

    <div class="tab-content">
        
        <div class="tab-pane active" id="login_details">

            <div class="card border-light">
                <div class="card-header main-color-bg">Step 1</div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">
                        <div class="form-group">

                            <label>Enter Identification number</label>
                            <input required type="text" name="UID" id="UID" class="form-control" maxlength="7">
                            <span id="error_ID" class="text-danger"></span>

                        </div>

                        <div class="form-group">

                            <label>Enter Password</label>
                            <input required maxlenght="20" type="password" name="password" id="password" class="form-control">
                            <span id="error_password" class="text-danger"></span>

                        </div>

                        <div class="form-group">

                            <label>Confirm Password</label>
                            <input required maxlenght="20" type="password" name="confirm" id="confirm" class="form-control">
                            <span id="error_confirm" class="text-danger"></span>

                        </div>
                    </div>

                    <br />

                    <div align="center">
                        <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-light btn-lg">
                            Next
                        </button>
                    </div>

                </div>


            </div>
        </div>

    


        <div class="tab-pane fade" id="personal_details">

            <div class="card border-light">
                <div class="card-header main-color-bg">Step 2</div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">

                        <div class="form-group" style="max-width: 80px">
    
                            <label>Title</label>
                            <select class="form-control">
                                <option value=""></option>
                                <option value="Dr.">Dr.</option>
                                <option value="Miss">Miss</option>
                                <option value="Mr.>Mr</option>
                                <option value="Mrs">Mrs</option>

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
                                <option value="" ></option>
                                <option value="1">SCIT</option>
                                <option value="2">SOE</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Upload Profile Picture</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <span id="error_img" class="text-danger"></span>

                        </div>

                    </div>

                    <br />

                    <div align="center">
                        <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-light btn-lg">
                            Prev
                        </button>
                        <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-light btn-lg">
                            Next
                        </button>
                    </div>

                </div>


            </div>
        </div>

        <div class="tab-pane fade" id="contact_details">

            <div class="card border-light">
                <div class="card-header main-color-bg">Step 3</div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">

                        
                        <div class="form-group">

                            <label>Enter Email</label>
                            <input required type="text" name="email" id="email" class="form-control">
                            <span id="error_email" class="text-danger"></span>

                        </div>

                        <div class="form-group">

                            <label>Enter Phone Number</label>
                            <input required type="text" name="phone" id="phone" class="form-control">
                            <span id="error_phone" class="text-danger"></span>

                        </div>

                       
                        
                    </div>

                    <br />

                    <div align="center">
                        <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-light btn-lg">
                            Prev
                        </button>
                        <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-light btn-lg">
                            Finish
                        </button>
                    </div>

                </div>


            </div>
        </div>



    </div>

</form>
</div>';

include 'advisorTemplate.php';
?>


<script>
    $(document).ready(() => {
        //Validation code

        //Validation code for Next button on Step one
        $('#btn_login_details').click(()=>{

            let error_ID = "";
            let error_password = "";
            let error_confirm = "";
            const idFilter = /^[0-9]*$/;

            if ($.trim($('#UID').val()).length < 7)//checks if id number is less than 7 characters
            {
                error_ID = 'Please enter 7 digit ID number';
                $('#error_ID').text(error_ID);
                $('#UID').addClass('has-error');
            }
            else{

                if(!idFilter.test($('#UID').val()))//makes sure id number is only numbers
                {
                    error_ID = 'Please enter valid ID number';
                    $('#error_ID').text(error_ID);
                    $('#UID').addClass('has-error');
                }
                else
                {
                    //remove error messages 
                    error_ID = '';
                    $('#error_ID').text(error_ID);
                    $('#UID').removeClass('has-error')
                }
                              
            }

            if ($.trim($('#password').val()).length == 0) // checks if password was entered 
            {
                error_password = 'Password is required';
                $('#error_password').text(error_password);
                $('#password').addClass('has-error');
            }
            else{

                if($.trim($('#password').val()).length < 8 ) // checks if password is less than 8 characters
                {
                    error_password = 'Password must be at least 8 characters';
                    $('#error_password').text(error_password);
                    $('#password').addClass('has-error');
                }
                else
                {
                    error_password = '';
                    $('#error_password').text(error_password);
                    $('#password').removeClass('has-error');

                    if ($.trim($('#confirm').val()).length == 0) // checks if confirm password was entered
                    {
                        error_confirm = 'Please confirm password';
                        $('#error_confirm').text(error_confirm);
                        $('#confirm').addClass('has-error');
                    }
                    else
                    {

                            if($('#confirm').val() !== $('#password').val()) // checks if confirm password matched
                            {
                                error_confirm = 'Passwords did not match';
                                $('#error_confirm').text(error_confirm);
                                $('#confirm').addClass('has-error');
                            }
                            else
                            {
                                error_confirm = '';
                                $('#error_confirm').text(error_confirm);
                                $('#confirm').removeClass('has-error');
                            }

                    }


                }

            }

            if(error_ID != '' || error_password != '' || error_confirm != '')
            {
                return false;
            }
            else
            {   
                //remove classes from Login details tab
                $('#list_login_details').removeClass('active active_tab1');
                $('#list_login_details').removeAttr('href data-toggle');

                //Make login details tab inactive
                $('#list_login_details').addClass('inactive_tab1');

                //change tab content to next tab
                $('#login_details').removeClass('active');
                $('#login_details').addClass('fade');
                $('#personal_details').removeClass('fade');
                $('#personal_details').addClass('active');

                // make personal details tab active
                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1');
                
                //add toggle 
                $('#list_personal_details').attr('href','#personal_details');
                $('#list_personal_details').attr('data-toggle','tab');


            }

           


        });

        // when previous button is clicked on step 2
        $('#previous_btn_personal_details').click(()=>{

            $('#list_personal_details').removeClass('active active_tab1');
            $('#list_personal_details').removeAttr('href data-toggle');
            $('#personal_details').removeClass('active');

            $('#list_personal_details').addClass('inactive_tab1');
            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1');
            $('#list_login_details').attr('href','#login_details');
            $('#list_login_details').attr('data_toggle', 'tab');
            $('#login_details').removeClass('fade');
            $('#login_details').addClass('active');


        });



    });
</script>