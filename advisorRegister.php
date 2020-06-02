<?php


$page_title = "Registration";

$header = "Advisor Registration";

$style = '';

$crumb = '';

$sidebar = '';

$main = '<div class="container box" style="max-width: 800px;">
<h2 align="center">
    Registration form
</h2>
<form action="advisorInsert.php" method="post" enctype="multipart/form-data" id="register_form">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a  class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Login</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link inactive_tab1" style="border:1px solid #ccc" id="list_personal_details">Personal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link inactive_tab1" style="border:1px solid #ccc" id="list_contact_details">Contact</a>
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

                        <div class="form-group" >
    
                            <label>Title</label>
                            <select style="max-width: 80px" id="advisor_title" name="advisor_title" class="form-control">
                                <option value=""></option>
                                <option value="Dr.">Dr.</option>
                                <option value="Miss">Miss</option>
                                <option value="Mr.">Mr</option>
                                <option value="Mrs">Mrs</option>

                            </select>
                            <span id="error_advisor_title" style="color: red;"></span>
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
                            <select id="school" name="school" class="form-control">
                                <option value="" ></option>
                                <option value="1">SCIT</option>
                                <option value="2">SOE</option>
                            </select>
                            <span id="error_school" style="color: red;"></span>

                        </div>

                        <div class="form-group">
                            <label>Upload Profile Picture <small>(Optional)</small></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" id="img" aria-describedby="inputGroupFileAddon01">
                                    <label id="img_label" class="custom-file-label" for="img">Choose file</label>
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


        //add file name to file upload
        $('#img').on('change',()=>{

            
            $('#img_label').text($('#img').val().replace(/^.*[\\\/]/, ''))
           
        });

        

        //Validation code

        //Validation code for Next button on Step one
        $('#btn_login_details').click(()=>{

            let error_ID = "";
            let error_password = "";
            let error_confirm = "";
            let uid = $('#UID').val();
            
            const idFilter = /^[0-9]*$/;


            if ($.trim(uid).length < 7)//checks if id number is less than 7 characters
            {
                error_ID = 'Please enter 7 digit ID number';
                $('#error_ID').text(error_ID);
                $('#UID').addClass('has-error');
            }
            else{

                if(!idFilter.test(uid))//makes sure id number is only numbers
                {
                    error_ID = 'Your ID# should be all digits';
                    $('#error_ID').text(error_ID);
                    $('#UID').addClass('has-error');

                }
                else
                    {
                        $.ajax({
                            url: "usercheck.php",
                            method: "POST",
                            data:{userId : uid},
                            dataType: "text",
                            async: false,
                            success: function (result){
                                

                                if (result != 0){

                                    error_ID = 'ID # already exists, please proceed to login';
                                    $('#error_ID').text(error_ID);
                                    $('#UID').addClass('has-error');
                                    setError_ID(message);
                                    

                                } 
                                else 
                                {
                                    
                                    //remove error messages 
                                    error_ID = '';
                                    $('#error_ID').text(error_ID);
                                    $('#UID').removeClass('has-error')
                                   
                                }
                            }
                            
                        });
                        
                        

                        
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
            $('#personal_details').removeClass('active');
            $('#list_personal_details').addClass('inactive_tab1');
            
            $('#list_login_details').removeClass('inactive_tab1');
            $('#list_login_details').addClass('active_tab1')
            $('#list_login_details').attr('data_toggle', 'tab');
            $('#login_details').removeClass('fade');
            $('#login_details').addClass('active');


        });

        //Validation code for Next button on Step 2
        $('#btn_personal_details').click(()=>{

            let error_advisor_title=""
            let error_fname=""
            let error_lname=""
            let error_school=""
            let error_img=""
            const nameFilter = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/
            const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i

            //TITLE VALIDATION
            if($.trim($('#advisor_title').val()) == ""){

                error_advisor_title = 'Please select a title';
                $('#error_advisor_title').text(error_advisor_title);
                $('#advisor_title').addClass('has-error');

            } 
            else
            {
                //remove error messages 
                error_advisor_title = '';
                $('#error_advisor_title').text(error_advisor_title);
                $('#advisor_title').removeClass('has-error')

            }


            //FIRST NAME VALIDATION
            if($.trim($('#fname').val()).length === 0 ){


                error_fname = 'Name is required';
                $('#error_fname').text(error_fname);
                $('#fname').addClass('has-error');

            }
            else 
            if(!nameFilter.test($('#fname').val()))//test name for invalid characters
            {

                error_fname = 'Please enter a valid name';
                $('#error_fname').text(error_fname);
                $('#fname').addClass('has-error');

            }
            else
            {   
                //Make sure First letter is Capitalized
                let fname = $.trim($('#fname').val()).toLowerCase()
                fname = fname[0].toUpperCase()+fname.slice(1)
                $('#fname').val(fname)

                //remove error messages 
                error_fname = ''
                $('#error_fname').text(error_fname)
                $('#fname').removeClass('has-error')
            }


            //LAST NAME VALIDATION
            if($.trim($('#lname').val()).length === 0 ){


                error_lname = 'Name is required';
                $('#error_lname').text(error_lname);
                $('#lname').addClass('has-error');

            }
            else 
            if(!nameFilter.test($('#lname').val()))//test name for invalid characters
            {

                error_lname = 'Please enter a valid name';
                $('#error_lname').text(error_lname);
                $('#lname').addClass('has-error');

            }
            else
            {   
                
                //remove error messages 
                error_lname = ''
                $('#error_lname').text(error_lname)
                $('#lname').removeClass('has-error')
            }

            //SCHOOL VALIDATION
            if($.trim($('#school').val()) == ""){

                error_school = 'Please select a School';
                $('#error_school').text(error_school);
                $('#school').addClass('has-error');

            } 
            else
            {
                //remove error messages 
                error_school = '';
                $('#error_school').text(error_school);
                $('#school').removeClass('has-error')

            }

            //IMAGE VALIDATION
            if($('#img').val() == ""){

                 //remove error messages 
                 error_img= '';
                $('#error_img').text(error_img);
                $('#img').removeClass('has-error')

            } else
           
            if(!allowedExtensions.exec($('#img').val())){

                error_img = 'Please upload file having extensions .jpg, .jpeg, .png or .gif';
                $('#error_img').text(error_img);
                $('#img').addClass('has-error');

            }
            else 
            {
                //remove error messages 
                error_img= '';
                $('#error_img').text(error_img);
                $('#img').removeClass('has-error')
            }

            if(error_advisor_title != '' || error_fname != '' || error_lname != '' || error_school != '' || error_img != '')
            {
                return false;
            }
            else
            {   
                //remove classes from Personal details tab
                $('#list_personal_details').removeClass('active active_tab1');

                //Make Personal details tab inactive
                $('#list_personal_details').addClass('inactive_tab1');

                //change tab content to next tab
                $('#personal_details').removeClass('active');
                $('#personal_details').addClass('fade');
                $('#contact_details').removeClass('fade');
                $('#contact_details').addClass('active');

                // make contact details tab active
                $('#list_contact_details').removeClass('inactive_tab1');
                $('#list_contact_details').addClass('active_tab1');
                
                //add toggle 
                $('#list_contact_details').attr('data-toggle','tab');


            }


        });

        
        // when previous button is clicked on step 3
        $('#previous_btn_contact_details').click(()=>{

            $('#list_contact_details').removeClass('active active_tab1');
            
            $('#contact_details').removeClass('active');
            $('#list_contact_details').addClass('inactive_tab1');

            $('#list_personal_details').removeClass('inactive_tab1');
            $('#list_personal_details').addClass('active_tab1');
           
            $('#list_personal_details').attr('data_toggle', 'tab');
            $('#personal_details').removeClass('fade');
            $('#personal_details').addClass('active');


        });

        //Validation code for Finish button on Step 3
        $('#btn_contact_details').click(()=>{

            let error_email =""
            let error_phone=""
            const emailFilter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            const phoneFilter = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/

            //Email Validation
            if($.trim($('#email').val()).length == 0){

                error_email= 'Email address is required';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');

            } 
            else if(!emailFilter.test($('#email').val())){

                error_email= 'Please enter valid email address';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');

            }
            else{

                //remove error messages 
                error_email= '';
                $('#error_email').text(error_email);
                $('#email').removeClass('has-error')

            }

            //Phone number validation
            if($.trim($('#phone').val()).length == 0){

                error_phone= 'Phone number is required';
                $('#error_phone').text(error_phone);
                $('#phone').addClass('has-error');

            } 
            else if(!phoneFilter.test($('#phone').val())){

                error_phone= 'Please enter valid phone number';
                $('#error_phone').text(error_phone);
                $('#phone').addClass('has-error');

            }
            else{

                //remove error messages 
                error_phone= '';
                $('#error_phone').text(error_phone);
                $('#phone').removeClass('has-error')

            }

            if(error_email != '' || error_phone != '' )
            {
                return false;
            }
            else
            {   
                //redirect to php file
                $('#register_form').submit();


            }

        });

     



    });
</script>