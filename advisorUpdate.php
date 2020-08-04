<?php 
    Session_start();//continue/start session

    if(isset($_SESSION['AdvisorID'])){
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
    
    $username = $FirstName;
    $page_title="Account";
    $header="My Account";
    $style='';

    $crumb='<div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="advisorDash.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account</li>
        </ol>
        </nav>
    </div>';

    $sidebar = '';

    $main = '<div class="container col-md-12">         
                <!-- Webpage Content Starts here -->
                <div class="">
            
                    <div class="divTable mb-3" style="border: 1px solid #000;" >
                        <div class="divTableBody" data="'.$AdvisorID.'">
                        
                            <div class="divTableRow row">
                                <div class="divTableCell"><b>First Name: </b><br>'.$FirstName.'</div>
                                <div class="divTableCell"><a href="advisorEdit.php?name=First%20Name&edit=FirstName&current='.$FirstName.'" class="btn btn-info"> Edit </a></div>
                            </div>
                            <div class="divTableRow row">
                                <div class="divTableCell"><b>Last Name: </b><br>'.$LastName.'</div>
                                <div class="divTableCell"><a href="advisorEdit.php?name=Last%20Name&edit=LastName&current='.$LastName.'" class="btn btn-info"> Edit </a></div>
                            </div>
                            <div class="divTableRow row">
                                <div class="divTableCell"><b>Phone Number: </b><br>'.$Phone.'</div>
                                <div class="divTableCell"><a href="advisorEdit.php?name=Number&edit=Phone&current='.$Phone.'" class="btn btn-info"> Edit </a></div>
                            </div>
                            <div class="divTableRow row">
                                <div class="divTableCell"><b>Email Address: </b><br>'.$Email.'</div>
                                <div class="divTableCell"><a href="advisorEdit.php?name=Email%20Address&edit=Email&current='.$Email.'" class="btn btn-info"> Edit </a></div>
                            </div>
                            <div class="divTableRow row">
                                <div class="divTableCell"><b>Password: </b><br>*********</div>
                                <div class="divTableCell"><a href="advisorEditPassword.php" class="btn btn-info"> Edit </a></div>
                            </div>
                            
                        </div>
                    </div>
                    <div><a id="delete"style="float: right"class="btn btn-danger "> Delete Account </a></div>
            
                </div>
            
            </div>';
  
    include 'advisorTemplate.php';
?>

<script>
    $(document).ready(()=>{
        $("#delete").click(()=>{
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this account",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({

                url: "deleteAccount.php",
                method: "POST",
                data:{
                    UID : $(".divTableBody").attr('data')                   
                },
                dataType: "text",
                async: false,
                success: function (html){
                    window.location.replace("index-page.php");
                    
                }

                });
            } else {
                swal("Cancelled account deletion");
            }
            });
        })
    })
</script>