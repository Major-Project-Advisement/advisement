<?php 
include_once 'includes/config.php';

Session_start();//continue/start session


if(isset($_POST['submit-button'])){

		
    foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
    {
        $$key = $value; //local
        $_SESSION[$key] = $value; //SESSION
    }

    if(empty($UID) || empty($password))//if fields are empty
    { 
        header("Location: advisorLogin.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM advisor WHERE EmployeeID=?;"; //sql statement with ? placeholder 
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: advisorLogin.php?error=sqlerror");
			exit();
        }
        else 
        {

            mysqli_stmt_bind_param($stmt, "s", $UID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){


                if(password_verify($password, $row['Password'])){

                    session_destroy();
                    session_start();
                    
                    foreach($row as $key => $value)
                        {							
                            $_SESSION[$key] = $value; //SESSION
                        }

                        header("Location: advisorDash.php?login=success");

                    
                } 
                else{
                        
                        
                    header("Location: advisorLogin.php?error=wrongpwd");

                } 
            }
            else 
            {

                header("Location: advisorLogin.php?error=nouser");
                exit();
            }
        }
    }
}
?>